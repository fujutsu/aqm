<?php
/**
 * AQM functions 
 *
 * @since AQM 1.0
 */

 

 

/**
 * Разбивает строку на первое слово и строку оставшыхся слов, первую букву строки оставшыхся слов подносит к верхнему регистру.
 */
function title_slice($title) {
	
	$sliced_array = array();
	$first_word = explode(' ', $title)[0];
	
	mb_internal_encoding("UTF-8"); 
	
	$remaining_words = substr( strstr( $title," " ), 1 );
	$remaining_words = mb_strtoupper(mb_substr($remaining_words, 0, 1)) . mb_substr($remaining_words, 1); // первую букву строки оставшыхся слов подносит к верхнему регистру
	
	array_push( $sliced_array, $first_word, $remaining_words);
	
	return $sliced_array;
}



/**
 * Проверяет родительсякая ли категория.
 */
function category_has_parent($current_cat, $is_category){
	
    $category = get_category($current_cat);
    if ( $category->category_parent > 0 and $category->category_parent = $is_category ){
        return true;
    }
    return false;
}



/**
 * Класс для плагина Multiple Post Thumbnails который отвечает за мультидобавлене изображений к посту.
 */
if (class_exists('MultiPostThumbnails')) {
	
	$posts_count = 9; // добавить 9 постов + первый существует по умолчанию
	
	for( $i = 0; $i < 9; $i++ ) {
	
		new MultiPostThumbnails(array( 'label' => $i+2 . '-е изображение', 'id' =>  $i+2 . '-image', 'post_type' => 'post' ) ); // цикл добавления постов
	}

}



/**
 * Устанавливает базовые возможности темы
 */
add_action( 'after_setup_theme', 'setup' );
function setup() {
    add_theme_support( 'post-thumbnails' ); // Позволяет устанавливать миниатюру посту
	
	add_image_size( 'slider-thumb', 864, 470, true); // Создание нового размера изобраения для слайдера блога
}



/**
 * Выводит css классы относящиеся к текущей странице.
 */
function aqm_body_classes( $classes ) {
	
	// добавим класс 'class-name' в массив классов $classes
	if( is_page_template('page-contacts.php') ){
		$classes[] = 'contact_page';
	}
	
	return $classes;
}
add_filter('body_class','aqm_body_classes');



/**
 * Обрезает текст до нужнго количества символов.
 */
function strip_text($string, $lengh = 250 ){
	$string = strip_tags($string);
	
	if(strlen($string) > $lengh){
		$string = substr($string, 0, $lengh);
		$string = rtrim($string, "!,.-");
		$string = substr($string, 0, strrpos($string, ' '));
		echo $string."… ";
	}
	else
		echo $string;
}



/**
 * Получает URL и парсит его.
 */
function get_url(){
	$parsed_url = explode('/', $_SERVER['REQUEST_URI']);
	return $parsed_url;	
}



/**
 * Получение ID усех дочерных категорий усех уровней вложений указанной родительской категории.
 */
function categories_subchildren( $parent_category ){
	
	$get_subchildrens_cats = get_categories( array(
											'child_of' => $parent_category,
											'hide_empty' => false
	) );
	
	$subchildrens_cats_ID = array();

	foreach( $get_subchildrens_cats as $index => $category ){
		array_push($subchildrens_cats_ID, $category->cat_ID);
	}
	
	array_push($subchildrens_cats_ID, $parent_category);
	return $subchildrens_cats_ID;
}



/**
 * Плучает страницу пагинации
 */
function paged(){
	
	$paged = get_url();
	end($paged);
	
	if( $paged[key( $paged )-2] == 'page' and is_numeric( (int) $paged[key( $paged )-1] ) )
		$paged = (int) $paged[key( $paged )-1];
	else
		$paged = 1;
	
	return $paged;
}



/**
 * Для работы пагинации в адресной строке (1)
 */
function codernote_request($query_string ) {
  if ( isset( $query_string['page'] ) ) {
    if ( ''!=$query_string['page'] ) {
      if ( isset( $query_string['name'] ) ) {
        unset( $query_string['name'] ); }
      }
    }
    return $query_string;
}
add_filter('request', 'codernote_request');



/**
 * Для работы пагинации в адресной строке (2)
 */
add_action('pre_get_posts', 'codernote_pre_get_posts');
function codernote_pre_get_posts( $query ) {
  if ( $query->is_main_query() && !$query->is_feed() && !is_admin() ) {
    $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );
  }
}



/**
 * Пагинация
 */
function my_pagenavi( $wp_query = false ) {

	if( $wp_query == false ){
		global $wp_query;
	}
	
	$big = 999999999; // уникальное число для замены
	$paged = paged();
	
	$args = array(
		'base'         => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format'       => '',
		'total'        => ceil( $wp_query->found_posts / $wp_query->query['posts_per_page']),
		'current'      => max( 1, $paged ),
		'show_all'     => False,
		'end_size'     => 1,
		'mid_size'     => 2,
		'prev_next'    => True,
		'prev_text'    => __('<li class="page page_arrow">Назад</li>'),
		'next_text'    => __('<li class="page page_arrow">Далее</li>'),
		'type'         => 'plain',
		'add_args'     => False,
		'add_fragment' => '',
		'before_page_number' => '<li class="page page_number">',
		'after_page_number'  => '</li>'
	); 

	$result = paginate_links( $args );

	// удаляем добавку к пагинации для первой страницы
	$result = str_replace( '/page/1/', '', $result );
	$result = str_replace( '<li class="page page_number">' . $paged, '<li class="page page_number active">' . $paged, $result );

	print_r($result) ;
}


/**
 * Постраничная навигация с асинхронной подгрузкой постов c помощью прокрутки вниз.
 */
if( isset(get_url()[1]) and get_url()[1] == 'reviews' ){
	
	function true_loadmore_scripts() {
		
		wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
	}
	add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );
}


function true_load_posts(){
	
	$args = unserialize( stripslashes($_POST['query']) );
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';

	$q = new WP_Query($args);
	
	if( $q->have_posts() ):
		while($q->have_posts()): $q->the_post();
		?>
			
			<div class="video" style="height: 203.001px;">
				<iframe width="100%" height="100%" src="<?php echo get_post_meta( get_the_ID(), 'wpcf-ssylka-na-video-otzyv', true ); ?>" frameborder="0" allowfullscreen></iframe>
			</div>
			
		<?php
		endwhile;
	endif;
	wp_reset_postdata();
	die();
}

add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');



/**
 * Регистрация сайдбаров для Google и Facebook.
 */
function register_my_widgets(){
	
	register_sidebar( array(
		'name' => "Google сайдбар",
		'id' => 'google-sidebar',
		'description' => 'Сайдбар для виджета Google',
		'before_title' => '<div style="margin:15px;font-family: Didact Gothic; font-weight: 700;">',
		'after_title' => '</div>'
	) );
	
	register_sidebar( array(
		'name' => "Facebook сайдбар",
		'id' => 'facebook-sidebar',
		'description' => 'Сайдбар для виджета Facebook',
		'before_title' => '<div style="margin:15px;font-family: Didact Gothic; font-weight: 700;">',
		'after_title' => '</div>'
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );



/**
 * Отправка сообщений на CRM bitrix24 (подключение скрипта).
 */
function bitrix24_script() {
	
 	wp_enqueue_script( 'bitrix24-script', get_stylesheet_directory_uri() . '/js/common.js', array('jquery'), $ver = false, $in_footer = true );
	
	wp_localize_script('bitrix24-script', 'myajax',
		array( 'url' => admin_url('admin-ajax.php') )
	); // Инициализация переменной myajax.url для javascript
	
}
add_action( 'wp_enqueue_scripts', 'bitrix24_script');



/**
 * Отправка сообщений на CRM bitrix24 (Ajax обработчик).
 */
function bitrix24_function(){

	// CRM server conection data
	define('CRM_HOST', 'aqm.bitrix24.ru'); // your CRM domain name
	define('CRM_PORT', '443'); // CRM server port
	define('CRM_PATH', '/crm/configs/import/lead.php'); // CRM server REST service path

	// CRM server authorization data
	define('CRM_LOGIN', 'designer1@aqm.in.ua'); // login of a CRM user able to manage leads
	define('CRM_PASSWORD', 'aquamarine4444'); // password of a CRM user
	// OR you can send special authorization hash which is sent by server after first successful connection with login and password
	//define('CRM_AUTH', 'e54ec19f0c5f092ea11145b80f465e1a'); // authorization hash

	/********************************************************************************************/

	// POST processing
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		parse_str($_POST['params'], $my_array_of_vars);
		$leadData = $my_array_of_vars['DATA'];
		
		$TITLE = $leadData['TITLE'];
		$NAME = $leadData['NAME'];
		
		if(isset($leadData['PHONE_WORK']))
			$PHONE_WORK = $leadData['PHONE_WORK'];
		if(isset($leadData['EMAIL_WORK']))
			$EMAIL_WORK = $leadData['EMAIL_WORK'];
		if(isset($leadData['COMMENTS']))
			$COMMENTS = $leadData['COMMENTS'];
		
		// get lead data from the form
		$postData = compact('TITLE','NAME','PHONE_WORK','EMAIL_WORK','COMMENTS');
	
		// append authorization data
		if (defined('CRM_AUTH'))
		{
			$postData['AUTH'] = CRM_AUTH;
		}
		else
		{
			$postData['LOGIN'] = CRM_LOGIN;
			$postData['PASSWORD'] = CRM_PASSWORD;
		}

		// open socket to CRM
		$fp = fsockopen("ssl://".CRM_HOST, CRM_PORT, $errno, $errstr, 30);
		if ($fp)
		{
			// prepare POST data
			$strPostData = '';
			foreach ($postData as $key => $value)
				$strPostData .= ($strPostData == '' ? '' : '&').$key.'='.urlencode($value);

			// prepare POST headers
			$str = "POST ".CRM_PATH." HTTP/1.0\r\n";
			$str .= "Host: ".CRM_HOST."\r\n";
			$str .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$str .= "Content-Length: ".strlen($strPostData)."\r\n";
			$str .= "Connection: close\r\n\r\n";

			$str .= $strPostData;

			// send POST to CRM
			fwrite($fp, $str);

			// get CRM headers
			$result = '';
			while (!feof($fp))
			{
				$result .= fgets($fp, 128);
			}
			fclose($fp);

			// cut response headers
			$response = explode("\r\n\r\n", $result);

			$output = '<pre>'.print_r($response[1], 1).'</pre>';
		}
		else
		{
			echo 'Connection Failed! '.$errstr.' ('.$errno.')';
		}
	}
	else
	{
		$output = 'Спасибо за заявку!';
	}

	print_r( $output );
	die();
}

add_action('wp_ajax_bitrix24', 'bitrix24_function');
add_action('wp_ajax_nopriv_bitrix24', 'bitrix24_function');



/**
 * Подключение стилей и скриптов.
 */
function aqm_scripts_styles() {
	
	$category_id = get_category_by_slug( get_url()[3] )->cat_ID;
	
	////////////////////////
	/* Подключение стилей */
	////////////////////////
	

		wp_register_style( 'animate', get_template_directory_uri() . '/css/animate.css');
		wp_register_style( 'style', get_template_directory_uri() . '/css/style.css');
		wp_register_style( 'features', get_template_directory_uri() . '/css/features.css');
		

		
		if( is_page_template('page-gallery.php') ){
			wp_register_style( 'twentytwenty', get_template_directory_uri() . '/css/twentytwenty.css');
			wp_enqueue_style( 'twentytwenty' );
		}
		
		wp_enqueue_style( 'animate' );
		wp_enqueue_style( 'style' );
		wp_enqueue_style( 'features' );
		
		if( is_page_template('page-contacts.php') ){
			wp_register_style( 'contacts_styles', get_template_directory_uri() . '/css/styles-for-individual-pages/contacts_styles.css');
			wp_enqueue_style( 'contacts_styles' );
		}
		if( is_page_template('page-gallery.php') ){
			wp_register_style( 'gallery_styles', get_template_directory_uri() . '/css/styles-for-individual-pages/gallery_styles.css');
			wp_enqueue_style( 'gallery_styles' );
		}
		if( is_category( categories_subchildren(8) ) or is_search() or is_tag() or is_single() ){
			wp_register_style( 'single_styles', get_template_directory_uri() . '/css/styles-for-individual-pages/single_styles.css');
			wp_enqueue_style( 'single_styles' );
		}
		if( is_page_template('page-about.php') ){
			wp_register_style( 'about_styles', get_template_directory_uri() . '/css/styles-for-individual-pages/about_styles.css');
			wp_enqueue_style( 'about_styles' );
		}
	
	
	//////////////////////////
	/* Подключение скриптов */
	//////////////////////////
	
		wp_deregister_script( 'jquery' );
		
		if( is_single() ){
			wp_deregister_script( 'dsq_count_script' );
		}
		 
		wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', false, null, true);
		wp_register_script( 'mobile_menu', get_template_directory_uri() . '/js/mobile_menu.js', array('jquery'), null, true);
		wp_register_script( 'consult_modal', get_template_directory_uri() . '/js/consult_modal.js', array('jquery'), null, true);
		wp_register_script( 'jquery_viewportchecker', get_template_directory_uri() . '/js/jquery.viewportchecker.min.js', array('jquery'), null, true);
		wp_register_script( 'scroll_effects', get_template_directory_uri() . '/js/scroll_effects.js', array('jquery', 'jquery_viewportchecker'), null, true);
		
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'mobile_menu' );
		wp_enqueue_script( 'consult_modal' );
		wp_enqueue_script( 'jquery_viewportchecker' );
		wp_enqueue_script( 'scroll_effects' );
		

		if( is_tax('services') or is_page_template('page-gallery.php')  or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ){
	
			wp_register_style( 'jquery_slick_css', get_template_directory_uri() . '/css/slick.css');
			wp_register_script( 'jquery_slick_js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), null, true);
			
			wp_enqueue_style( 'jquery_slick_css' );
			wp_enqueue_script( 'jquery_slick_js' );
			
			if( is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ){
				wp_register_script( 'blog_scripts', get_template_directory_uri() . '/js/blog_scripts.js', array('jquery', 'jquery_slick_js'), null, true);
				wp_enqueue_script( 'blog_scripts' );
				
				if( is_single() ){
					wp_register_script( 'social', get_template_directory_uri() . '/js/social.js', array('jquery'), null, true);
					wp_enqueue_script( 'social' );
				}
			}
			
			if( is_page_template('page-gallery.php') ){
		
				wp_register_script( 'jquery_twentytwenty', get_template_directory_uri() . '/js/jquery.twentytwenty.js', array('jquery'), null, true);
				wp_register_script( 'jquery_event_move', get_template_directory_uri() . '/js/jquery.event.move.js', array('jquery'), null, true);
				wp_register_script( 'jquery_mCustomScrollbar_js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js', array('jquery'), null, true);
				wp_register_style( 'jquery_mCustomScrollbar_css', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.min.css');
				wp_register_script( 'gallery_scripts', get_template_directory_uri() . '/js/gallery_scripts.js', array('jquery', 'jquery_slick_js'), null, true);
				
				wp_enqueue_script( 'jquery_twentytwenty' );
				wp_enqueue_script( 'jquery_event_move' );
				wp_enqueue_script( 'jquery_mCustomScrollbar_js' );
				wp_enqueue_style( 'jquery_mCustomScrollbar_css' );
				wp_enqueue_script( 'gallery_scripts' );
			}
		
			if( is_tax('services') ){
				wp_register_script( 'services', get_template_directory_uri() . '/js/services.js', array('jquery', 'jquery_slick_js'), null, true);
				wp_enqueue_script( 'services' );
			}
		}
		
		if( is_tax('services') or is_page_template('page-contacts.php') ){
		
			wp_register_script( 'map', get_template_directory_uri() . '/js/map.js', array('jquery'), null, true);
			wp_enqueue_script( 'map' );
			
			if( is_tax('services') ){
				wp_register_script( 'maps_googleapis_Dark', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC4H5-YW7iQeejWHojtjT7M1fhc6GpWFUQ&amp;callback=initMapDark', array('jquery', 'map'), null, true);
				wp_enqueue_script( 'maps_googleapis_Dark' );
			}
			elseif( is_page_template('page-contacts.php') ){
				wp_register_script( 'maps_googleapis_Yellow', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC4H5-YW7iQeejWHojtjT7M1fhc6GpWFUQ&amp;callback=initMapYellow', array('jquery', 'map'), null, true);
				wp_enqueue_script( 'maps_googleapis_Yellow' );
			}
		}
}    
add_action( 'wp_enqueue_scripts', 'aqm_scripts_styles', 1);



/**
 * Раздел настроек сайта.
 */
if( function_exists('acf_add_options_page') ) {
 
	acf_add_options_page(array(
		'page_title' 	=> 'Общие настройки сайта',
		'menu_title' 	=> 'Настройки сайта',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'manage_options',
		'redirect' 	=> false
	));
		
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Страница "О нас"',
		'menu_title' 	=> 'Страница "О нас"',
		'menu_slug' 	=> 'about',
		'parent_slug' 	=> 'theme-general-settings'
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Блок контактов (который расположен на карте) на странице "Контактов" и "Услуг"',
		'menu_title' 	=> 'Страница "Контакты"',
		'menu_slug' 	=> 'kontakty',
		'parent_slug' 	=> 'theme-general-settings'
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Страница "Услуги"',
		'menu_title' 	=> 'Страница "Услуги"',
		'menu_slug' 	=> 'services',
		'parent_slug' 	=> 'theme-general-settings'
	));
	
}
?>