<?php get_header(); ?>

	<div class="blog_wrapper clearfix">
	
		<?php get_template_part( 'templates/blog-navigation-menu' ); ?>
		
		<div class="content">
			<div class="search block">
				<form action="#">
					<input type="text">
					<input type="submit" value="">
				</form>
			</div>
			
			<div class="full_news block_full_news">
				<nav class="breadcrumbs menu_inline">
					<ul>
						<li><?php if( function_exists('bcn_display') ) bcn_display(); ?></a></li>
					</ul>
				</nav>
				
				<?php if( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail( 'slider-thumb', 'class=big_sprite&alt=spirite'); ?>
				<?php else: ?>
					<img class="big_sprite" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-for-slider.png" >
				<?php endif; ?>
				
				<div class="full_news_text">
					<h2><?php the_title(); ?></h2>
					<div class="underheader">
						<div class="calendar">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/calendar.png" alt="">
							<span><?php echo get_the_date(); ?></span>
						</div>
						
						<?php echo  get_the_category_list( ' | ' ); ?>
						
						<div class="rating">
						
						</div>
					</div>
					
					<div class="article">
						<?php the_content(); ?>
						<br>
						
						<?php if( has_tag() ): ?>
							<?php echo get_the_tag_list( '<i><b>Метки:</b> ', ', ', '</i>'); ?>
							<br>
							<br>
						<?php endif; ?>
						
						<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
					</div>
					
				</div>
			</div>
			
			<div class="prev_next">
				<?php if( get_previous_post_link('%link', '', true) ): ?>
					<div class="prev">
						<?php previous_post_link('%link', 'Предыдущая новость из категории', true) ? previous_post_link('%link', 'Предыдущая новость из категории', true) : null; ?>
					</div>
				<?php else: ?>
					<div class="empty_link_prev"></div>
				<?php endif; ?>
				<?php if( get_next_post_link('%link', '', true) ): ?>
					<div class="next">
						<?php next_post_link('%link', 'Следующая новость из категории', true) ? next_post_link('%link', 'Следующая новость из категории', true): null; ?>
					</div>
				<?php else: ?>
					<div class="empty_link_next"></div>
				<?php endif; ?>
			</div>
			
			<div class="share block_full_news" id="share-buttons">
				<h3>Поделиться в соц сетях</h3>
				<!-- Facebook--><a href="" id="soc_fb" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/soc_fb.png" alt=""></a>
				<!-- Twitter --><a href="" id="soc_tw" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/soc_tw.png" alt=""></a>
				<!-- Google+--><a href="" id="soc_goog" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/soc_goog.png" alt=""></a>
				<!-- LinkedIn--><a href="" id="soc_li" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/soc_li.png" alt=""></a>					
			</div>
				
			<?php 
				$args = array( 
					'category__in' => wp_get_post_categories( get_the_ID() ),
					'posts_per_page' => 3,
					'ignore_sticky_posts' => true,
					'post__not_in' => array( get_the_ID() ),
					'orderby' => 'ID',
					'order' => 'DESC'
				);
				query_posts( $args );
			?>
	
			<div class="recommend block_full_news">
				<h3>Рекомендуем</h3>
						
				<?php if( have_posts() ): ?>
					<div class="recommend_news_all">
					
						<?php while( have_posts() ): the_post(); ?>
						
							<div class="recommend_news">
								
								<?php if( has_post_thumbnail() ): ?>
									<img width="235" height="131" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>" >
								<?php else: ?>
									<img width="235" height="131" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-for-slider.png" >
								<?php endif; ?>
								
								<a href="<?php the_permalink(); ?>" class="news_header"><h5><?php echo strip_text( get_the_title(), 50); ?></h5></a>
								
							</div>
								
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						
					</div>
				<?php else: ?>
				
					<h4>Нет рекомендуемых</h4>
				<?php endif; ?>
				<?php wp_reset_query(); ?>	
				
			</div>
				
			<div class="disqus block_full_news">
				<?php comments_template(); ?>
			</div>
				
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>

<?php  get_footer(); ?>