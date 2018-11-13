<?php $get_posts = query_posts('cat=8&posts_per_page=4'); ?>

<?php if( have_posts() ): ?>

	<div class="slider sliderBlack block">
		
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="single_slide">
				<div class="single_slide_imgContainer">
					<?php if( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail('slider-thumb');?>
					<?php else: ?>
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-for-slider.png">
					<?php endif; ?>
				</div>
				
				<div class="slider_text">
					<a href="<?php the_permalink(); ?>" class="slider_title"><h2><?php the_title(); ?></h2></a>
					<span><?php echo get_the_date( 'j F Y' ); ?></span>
			
					<span>
						<?php $get_categories_names = get_the_category();
						
							foreach( $get_categories_names as $cat_index => $cat_value ){
								echo ' | ' . $cat_value->name;
							};
						?>
					</span>
				</div>
				
			</div>	
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>

<?php endif; ?>

<?php wp_reset_query(); ?>
