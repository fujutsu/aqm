<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>main</title>
		<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png" type="image/png">
		
		<?php wp_head(); ?>
	</head>
	
	<body <?php if(!is_search()) body_class(); ?>>
		<div class="figure_wrapper">
			
		<?php if( is_page_template('page-contacts.php') ): ?>
				<div class="figure4"></div>
				<div class="google_map"></div>
		</div>
		<?php elseif( is_page_template('page-gallery.php') ): ?>
				<div class="figure5"></div>
		</div>
		<?php else: ?>
			
			<!--header begin-->
			<?php if( is_home() and is_front_page() ): ?>
				<div class="figure1"></div>
				<div class="figure2"></div>
			<?php elseif( is_category( categories_subchildren(8) ) or is_page_template('page-about.php') or is_single() or is_search() or is_tag() ): ?>
				<div class="figure3"></div>
			<?php elseif( is_page_template( 'page-rewievs.php' ) ): ?>
				<div class="figure6"></div>
			<?php elseif( is_tax('services') ): ?>
				<div class="figure7"></div>
				<div class="figure8"></div>
				<div class="figure9"></div>
			<?php endif; ?>
			
		<?php endif; ?>
		
		<?php if( is_page_template('page-gallery.php') ): ?>
			<div class="general_wrapper">
		<?php endif; ?>
			<header class="header clearfix">
				<a href="<?php echo home_url(); ?>">
					<div class="logo <?php if( is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'logo_black'; ?>">
						<h1>AQM</h1>
						<span><?php the_field( 'logo_text', 'option' ) ?></span>
					</div>
				</a>
				
				<div class="header_right <?php if( is_page_template('page-contacts.php') or is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() ) echo 'header_right_black_menu'; ?>">
				
					<?php if( is_page_template('page-contacts.php') ): ?>
						<div class="angle"></div>
					<?php endif; ?>
					
					<div class="menu_button">
						<div class="menu_line <?php if( is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'menu_line_black'; ?>"></div>
						<div class="menu_line <?php if( is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'menu_line_black'; ?>"></div>
						<div class="menu_line <?php if( is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'menu_line_black'; ?>"></div>
					</div>
					<nav class="main_nav hide">
						<div class="hide_menu"></div>
						<a href="<?php echo home_url(); ?>" class="menu_text">
							<h1>AQM</h1>
							<span>Компания №1 в монтаже систем автополива</span>
						</a>
						<ul class="menu_inline">
							<li class="<?php if( is_page_template('page-about.php') ) echo 'menu_active_black'; ?>"><a href="<?php echo home_url(); ?>/about">О нас</a></li>
							<li class="<?php if( is_page_template('page-gallery.php') ) echo 'menu_active_black'; ?>"><a href="<?php echo home_url(); ?>/objects">Объекты</a></li>
							<li class="<?php if( is_page_template('page-rewievs.php') ) echo 'menu_active'; ?>"><a href="<?php echo home_url(); ?>/reviews">Отзывы</a></li>
							<li class="<?php if( is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'menu_active_black'; ?>"><a href="<?php echo home_url(); ?>/category/blog">Блог</a></li>
							<li class="<?php if( is_page_template('page-contacts.php') ) echo 'menu_active_black'; ?>"><a href="<?php echo home_url(); ?>/kontakty">Контакты</a></li>
						</ul>
					</nav>
					<div class="header_phone">
						<a href="tel:<?php the_field( 'phone_number', 'option' ) ?>" class="phone"><?php the_field( 'phone_number', 'option' ) ?></a>
						<div class="phone_text">Получить консультацию</div>
					</div>
				</div>
			</header>
			
        <div class="consult_modal hide">
            <div class="modal_wrapper">
				<div class="white_field"></div>
				<div class="figure10"></div>
				<form method="post" id="form">
					<div class="consult_text">
						<h1>Закажите консультацию</h1>
						<p>Для получения кунсультации<br> и обсуждения проекта</p>
					</div>
					<div class="consult_fields">
						<input type="hidden" name="DATA[TITLE]" value="Заказ консультации">
						<div class="input">
							<input type="text" name="DATA[NAME]" id="formName" placeholder="Ваше имя" required>
						</div>
						<div class="input">
							<input type="text" name="DATA[PHONE_WORK]" id="formPhone" title="Допустимы только цифры" placeholder="Телефон" required pattern="[0-9]{5,14}">
						</div>
						<input type="submit" name="submit" value="Оставить заявку">
						<div id="confirmForm" style="color:#46B005; font-weight:600; font-size:23px; margin-bottom:10px; text-align:center; display:none;">Спасибо за заявку!</div>
					</div>
				</form>
				<div class="close_modal"></div>
			</div>
        </div>
		<!--header end-->		