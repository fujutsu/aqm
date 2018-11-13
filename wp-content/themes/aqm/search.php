<?php get_header(); ?>

		<!-- Search form starts-->	
		<div class="blog_wrapper clearfix">

			<?php get_template_part( 'templates/blog-navigation-menu' ); ?>
		
			<?php
				$args = array_merge( $wp_query->query, array( 'post_type' => 'post', 'cat' => 8) );
				$asda = query_posts($args);
				
			?>
			
			<div class="content">
				<div class="search_bar">
					<nav class="breadcrumbs menu_inline">
						<ul>
							<li><a href="<?php echo home_url(); ?>">Главная</a></li>
							<li><a href="<?php echo home_url(); ?>/category/blog">Блог</a></li>
							<li>Результаты поиска</li>
						</ul>
					</nav>
					<h2>Результаты поиска</h2>
					<div class="search">
						<form action="#">
							<input type="text" placeholder="Запрос">
							<input type="submit" value="">
						</form>
					</div>
					<span>Количество найденных публикаций: <?php echo $wp_query->post_count; ?></span>
				</div>

				<div class="news_all">
					
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ): the_post(); ?>
						
							<div class="news block">
							
								<?php if( has_post_thumbnail() ): ?>
									<?php the_post_thumbnail( array(405, 215) ); ?>
								<?php else: ?>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-for-slider.png">
								<?php endif; ?>
								
								<div class="news_text">
									<a href="<?php the_permalink(); ?>" class="news_header">
										<h3><?php echo strip_text( get_the_title(), 175 ); ?></h3>
									</a>
									<p><?php echo strip_text(get_the_content(), 330); ?></p>
									<div class="date">
										<span><?php echo get_the_date(); ?></span>
									</div>
									<a href="<?php the_permalink(); ?>">Перейти...</a>
								</div>
							</div>
							
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else: ?>
						<div class="noposts">Поиск не дал результатов</div>
					<?php endif; ?>
					
                </div>
			</div>
			<?php wp_reset_query(); ?>
			
			<?php get_sidebar(); ?>

		</div>
		<!-- Search form ends-->	
		
<?php get_footer(); ?>