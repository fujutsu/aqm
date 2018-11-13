<?php
/*
 * Template Name: Отзывы
 */
?>

<?php  get_header(); ?>

<?php
            $args = array(
				'post_type' => 'review',
                   'publish' => true,
				   'posts_per_page' => 9,
                   'paged' => get_query_var('paged'),
				   'meta_query' => array(
						array(
							'key' => 'wpcf-ssylka-na-video-otzyv'
						)
					),
					'orderby'  => 'ID',
					'order'    => 'DESC'
               );
            
            query_posts( $args );
?>

<div class="reviews_wrapper">
	<div class="reviews">
		<h2>Отзывы наших клиентов</h2>
		
		<?php if( have_posts() ): ?>
		
			<?php while( have_posts() ): the_post(); ?>
			
				<div class="video">
					<iframe width="100%" height="100%" src="<?php echo get_post_meta( get_the_ID(), 'wpcf-ssylka-na-video-otzyv', true ); ?>" frameborder="0" allowfullscreen></iframe>
					<!--<img src="img/video_screen.jpg" alt="Видео">
					<button><img src="img/play_video.png" alt="Воспроизвести"></button>-->
				</div>
				
			<?php endwhile; ?>
			
			<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<!-- Постраничная навигация с асинхронной подгрузкой постов c помощью прокрутки вниз  Начало -->
			
				<script id="true_loadmore">
					var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
					var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
					var current_page = <?php echo paged(); ?>;
				</script>
				
			<!-- Постраничная навигация с асинхронной подгрузкой постов c помощью прокрутки вниз Конец-->
			<?php endif; ?>
			
		<?php else: ?>
		
			<h1 style="color: #ffffff;">Отзывы отсутствуют</h1>
			<div class="video"></div><div class="video"></div><div class="video"></div><div class="video"></div>
			
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		<?php wp_reset_query(); ?>

	</div>
</div>

<?php  get_footer(); ?>