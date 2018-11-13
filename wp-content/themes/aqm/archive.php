<?php  get_header(); ?>



<div class="blog_wrapper clearfix">

	<?php  get_template_part('templates/blog-navigation-menu'); ?>
	
	<!-- content starts -->
	<div class="content">
	
		<?php get_search_form(); ?>
		
		<div class="search_mobile">
			<form method="GET" id="searchform" action="<?php echo home_url( '/' ) ?>" role="search">
				<input type="text" name="s" placeholder="Поиск" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>">
				<input type="submit" value="">
			</form>
		</div>
		
		<?php get_template_part('templates/blog-slider'); ?>
		
		<div class="news_all">
		
			<?php
				$paged = paged();
				
				if( is_category('blog') ){
				
					$args = array(
						'paged' => $paged,
						'posts_per_page' => 10, // 2 - количество записей на одной странице
						'ignore_sticky_posts'=> 1,
						'cat' => $cat
					);
				}
				elseif( is_tag() ){
			
					$tag = get_queried_object();
					
				
					$args = array(
							'paged' => $paged,
							'posts_per_page' => 10, // 2 - количество записей на одной странице
							'ignore_sticky_posts'=> 1,
							'tag__in' => $tag->term_id
					);
				}
				else{
					
					// для всех подкатегорий блога
					$args = array(
						'paged' => $paged,
						'posts_per_page' => 10, // 2 - количество записей на одной странице 
						'ignore_sticky_posts'=> 1,
						'category__in' => array($cat)
					);
				}
					
				$temp = $wp_query;
				$wp_query = null;
				$wp_query = new WP_Query();
				$wp_query->query($args);
			?>
		
			<?php if( $wp_query->have_posts() ): ?>
				<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
				
					<div class="news block">

						<div class="news_img_wrap">
							<?php if( has_post_thumbnail() ): ?>
								<?php the_post_thumbnail( array(405, 215) ); ?>
							<?php else: ?>
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-for-slider.png">
							<?php endif; ?>
						</div>
						
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
			
				<?php if( is_tag() ): ?>
					<div class="noposts">С этой меткой нет записей</div>
				<?php else: ?>
					<div class="noposts">В этой категории нет записей</div>
				<?php endif; ?>
				
			<?php endif; ?>
			
		</div>

		<div class="pages">
			<ul>
				<?php my_pagenavi( $wp_query );?>
			</ul>
		</div>
		
		<?php wp_reset_query(); ?>
				
	</div>
	<!-- content ends -->
	
	<?php get_sidebar(); ?>

</div>

<?php  get_footer(); ?>
