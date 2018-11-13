	<div class="bottom_menu block">
	
		<!-- navigation menu start -->
		<nav>
			<ul class="menu_inline">
			
				<?php $blog_menu_categories = get_categories( array( 'parent' => 8, 'hide_empty' => false, 'orderby' => 'ID' ) ); ?>
				<?php foreach( $blog_menu_categories as $index => $category ): ?>
				
					<li data-menu-tab="<?php echo $index; ?>">
						<a href="<?php echo home_url(); ?>/category/blog/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
					</li>
					
				<?php endforeach; ?>
			
			</ul>
		</nav>
		<!-- navigation menu end -->	
		
		<!-- subcategories navigation menu start -->
		<?php $menu_categories = get_categories( array( 'parent' => 8, 'hide_empty' => false, 'orderby' => 'ID' ) ); ?>
		<?php foreach( $menu_categories as $index => $category ): ?>
		
			<div class="opened_menu" data-menu-tab="<?php echo $index; ?>">
				<div class="side_menu">
									
					<nav>
						<ul>
							<?php $menu_subcategories = get_categories( array( 'parent' => $category->cat_ID, 'hide_empty' => false, 'orderby' => 'ID', 'number' => 6  ) ); ?>
							<?php if( $menu_subcategories ): ?>
								<?php foreach( $menu_subcategories as $index_subcategory => $subcategory ): ?>
								
									<li data-menu-inner-tab="<?php echo $index_subcategory; ?>">
										<a href="<?php echo home_url(); ?>/category/blog/<?php echo $category->slug; ?>/<?php echo $subcategory->slug; ?>"><?php echo $subcategory->name; ?></a>
									</li>
									
								<?php endforeach; ?>
							<?php else: ?>
								<div style="text-align:center;color:red;width: 295px;padding-left: 10px; font-weight: 600;">В этой категории нет подкатегорий</div>
							<?php endif; ?>
						</ul>
					</nav>
				</div>
				
				<?php $menu_subcategories = get_categories( array( 'parent' => $category->cat_ID, 'hide_empty' => false, 'orderby' => 'ID', 'number' => 6  ) ); ?>
				
				<?php foreach( $menu_subcategories as $index_subcategory => $subcategory ): ?>
				
					<div class="opened_menu__news__wrapper" data-menu-inner-tab="<?php echo $index_subcategory; ?>">
					
						<?php global $query_string;
						
							 $sdadsd = query_posts( array(
												'cat' => $subcategory->cat_ID,
												'orderby' => 'ID',
												'order' => 'DESC',
												'hide_empty' => false,
												'orderby' => 'ID',
												'post_status' => 'publish',
												'posts_per_page' => 3,
												'ignore_sticky_posts'=> 1
							   ) );
						?>
						
						<?php if( have_posts() ): ?>
							<?php while( have_posts() ): the_post();?>
							
								<div class="opened_menu_news">
									
										<?php if( has_post_thumbnail() ): ?>
											<?php the_post_thumbnail( 'medium' ); ?>
										<?php else: ?>
											<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/no-photo-for-subcategory.png">
										<?php endif; ?>
										
									<a href="<?php the_permalink(); ?>">
										<h3><?php strip_text( get_the_title(), $lengh = 70 ); ?></h3>
									</a>
										
									<div class="date">
										<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/calendar.png" alt="">
										<span><?php echo get_the_date(); ?></span>
									</div>
								</div>
								
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
						<?php wp_reset_query(); ?>
						
					</div>
				
				<?php endforeach; ?>
			</div>
			
		<?php endforeach; ?>
		<!-- subcategories navigation menu end -->
		
		<select>
			<?php $blog_menu_categories = get_categories( array( 'parent' => 8, 'hide_empty' => false, 'orderby' => 'ID', 'number' => 6  ) ); ?>
			<?php foreach( $blog_menu_categories as $index => $category ): ?>
			
				<option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
				
			<?php endforeach; ?>
		</select>
		
	</div>