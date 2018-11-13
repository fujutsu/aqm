<!-- sidebar starts -->
<div class="sidebar">
	
	<?php get_search_form(); ?>
	
	<div class="sidebar_news block">
		
		<div class="switch">
			<button class="button active" data-tab="1">Свежие</button>
			<button class="button" data-tab="2">Популярные</button>
		</div>
		
		
		<!-- fresh posts starts -->
		<div class="fresh_news active" data-tab="1">
		
			<?php $get_posts = query_posts('cat=8&posts_per_page=5'); ?>
			<?php if( have_posts() ): ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="one_news">
						
							<?php if( has_post_thumbnail() ): ?>
								<?php the_post_thumbnail('thumbnail'); ?>
							<?php else: ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-thumb.png">
							<?php endif; ?>
							
							<a href="<?php the_permalink(); ?>" class="news_header">
								<h3><?php echo strip_text( get_the_title(), 120 ); ?></h3>
							</a>
							<span>
								<?php 
									foreach( get_the_category() as $cat_index => $cat_value ){
										echo ( $cat_index == 0 and !isset($cat_index[+1]) ) ? $cat_value->name : ( isset($cat_index[+1])  ? ' | ' . $cat_value->name  : ' | ' . $cat_value->name);
									}
								?>
							</span>
						</div>
					
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
		
			<?php endif; ?>
			<?php wp_reset_query(); ?>
	
		</div>
		<!-- fresh posts ends -->
		
		
		<!--  porular posts starts -->
		<?php
			$args = array(
				'cat' => 8,
				'posts_per_page' => 5,
				'meta_query' => array(
					array(
						'key' => 'ratings_score',
						'type' => 'NUMERIC'
					)
				),
				'orderby' => 'meta_value',
				'order'    => 'DESC'
			);
			   
			query_posts($args);	
		?>
				
		<div class="fresh_news popular_news" data-tab="2">
			<?php if( have_posts() ): ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
					
						<div class="one_news">
						
							<?php if( has_post_thumbnail() ): ?>
								<?php the_post_thumbnail('thumbnail'); ?>
							<?php else: ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-thumb.png">
							<?php endif; ?>
							
							<a href="<?php the_permalink(); ?>" class="news_header">
								<h3><?php echo strip_text( get_the_title(), 120 ); ?></h3>
							</a>
							<span>
								<?php 
									foreach( get_the_category() as $cat_index => $cat_value ){
										echo ( $cat_index == 0 and !isset($cat_index[+1]) ) ? $cat_value->name : ( isset($cat_index[+1])  ? ' | ' . $cat_value->name  : ' | ' . $cat_value->name);
									}
								?>
							</span>
						</div>
					
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
		
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</div>
		<!-- porular posts ends -->	
		
	</div>
	
	<div class="subscribe block">
		<h4>Подписка</h4>
		
		<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=in/rpfN', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
			<input type="email" name="email" placeholder="Ваш email адресс">
			<input type="hidden" value="in/rpfN" name="uri">
			<input type="hidden" name="loc" value="ru_RU">
			<button class="button">Подписка</button>
		</form>
		
	</div>
	
	<!--  best posts starts -->
	<div class="best block">
		<h4>Лучшие публикации</h4>
		<div class="sidebar_slider">
		
			<?php
				$args = array(
					'cat' => 8,
					'posts_per_page' => 5,
					'meta_query' => array(
						array(
							'key' => 'ratings_score',
							'type' => 'NUMERIC'
						)
					),
					'orderby' => 'meta_value',
					'order'    => 'DESC'
				);
				   
				query_posts($args);	
			?>
			
			<?php if( have_posts() ): ?>
					
				<?php while ( have_posts() ) : the_post(); ?>
					
					<div class="single_slide">
					
						<?php if( has_post_thumbnail() ): ?>
							<?php the_post_thumbnail( array( 379, 205 ) ); ?>
						<?php else: ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-for-slider.png">
						<?php endif; ?>
						
						<div class="sidebar_slider_text">
							<div class="rating">
								<ul>
									<?php 
										if( function_exists('the_ratings') ) {
										
											 $rating = expand_ratings_template('%RATINGS_IMAGES%', get_the_ID());
											 echo str_replace( array( '<img','/>' ), array( '<li><img','/></li>' ), $rating );
										}
									?>
								</ul>
							</div>
							<a href="<?php the_permalink(); ?>">Перейти...</a>
							<h5><a href="<?php the_permalink(); ?>"><?php echo strip_text( get_the_title(), 140 ); ?></a></h5>
						</div>
					
					</div>
					
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
		
			<?php endif; ?>
			<?php wp_reset_query(); ?>
			
		</div>
	</div>
	<!--  best posts starts -->
	
	<div class="google block">
		<?php if( is_active_sidebar( 'google-sidebar' ) ): ?>
			<?php dynamic_sidebar( 'google-sidebar' ); ?>
		<?php endif; ?>
	</div>
	
	<div class="facebook block">
		<?php if( is_active_sidebar( 'facebook-sidebar' ) ): ?>
			<?php dynamic_sidebar( 'facebook-sidebar' ); ?>
		<?php endif; ?>
	</div>
</div>
<!-- sidebar ends -->