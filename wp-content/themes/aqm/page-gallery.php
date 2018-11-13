<?php
/*
 * Template Name: Объекты
 */
?>

<?php
	global $post;
	$i = 1; // счетчик атрибута data-tab для каждного поста.
	
	$get_posts = get_posts( array(
		'post_type'   => 'object',
		'numberposts' => -1,
	) );
?>

<?php get_header(); ?>

		<div class="gallery_wrapper">
			<div class="gallery clearfix">
			
				<?php if( $get_posts ): ?>
				
					<div class="screen_slider">
						<div class="mobile_slider_points">
							<span onClick="" class="mobile_slider_points__arrow mobile_slider_points__arrow--left btnArrowLeft_js">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;" xml:space="preserve">
									<g><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0   c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744   c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z" fill="#999999"/></g>
								</svg>
							</span>
							<span class="mobile_slider_points__content"><span id="slidesItem">1</span> из <span id="slidesTotal">5</span></span>
							<span onClick="" class="mobile_slider_points__arrow mobile_slider_points__arrow--right btnArrowRight_js">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;" xml:space="preserve">
									<g><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744   L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284   c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z" fill="#999999"/></g>
								</svg>
							</span>
						</div>
						<ul onClick="" class="screen_slider_points">
							<div class="active_screen"></div>
						</ul>

						<?php foreach( $get_posts as $post ): setup_postdata( $post ) ?>

							<!-- single project begins -->

							<div class="slider" data-tab="<?php echo $i; ?>">
							
								<div class="slide">				
									<?php $images = get_field('object_images'); ?>
									<?php if($images): ?>
									
										<?php foreach($images as $index => $value): ?>
											<div class="slide_view">
												<img src="<?php echo $value['url']; ?>" width="732" height="412" >
											</div>
										<?php endforeach; ?>
										
									<?php endif; ?>
								</div>
								
								<div class="previews">
									<?php if($images): ?>
									
										<?php foreach($images as $index => $value): ?>
											<div class="slide_preview">
												<img src="<?php echo $value['url']; ?>" width="97" height="70" >
											</div>
										<?php endforeach; ?>
										
									<?php endif; ?>
								</div>
							</div>

							<div class="slide_description" data-tab="<?php echo $i++; ?>">
								<h2><?php the_title(); ?></h2>
								<ul class="nano">
									<?php the_content(); ?>
								</ul>
								<div class="description_scroll"></div>
								<button>Получить консультацию</button>
							</div>
							<!-- single project ends -->

						<?php endforeach; ?>
								
					</div>
					
				<?php else: ?>
					<h1>Записи отсутствуют</h1>
				<?php endif; wp_reset_postdata();?>
			
			</div>
		</div>

<?php  get_footer(); ?>