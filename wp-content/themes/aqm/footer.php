			<?php if( !is_tax('services') ): ?>
		
				<!--footer begin-->
				<footer class="footer">
					<div class="social">
						<a href="#">
							<div class="social_sprite <?php if( is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'social_sprite_black'; ?> fb"></div>
						</a>
						<a href="#">
							<div class="social_sprite <?php if( is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'social_sprite_black'; ?> inst"></div>
						</a>
						<a href="#">
							<div class="social_sprite <?php if( is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'social_sprite_black'; ?> tw"></div>
						</a>
						<a href="#">
							<div class="social_sprite <?php if( is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'social_sprite_black'; ?> vk"></div>
						</a>
					</div>

					<div class="made_by <?php if( is_page_template('page-contacts.php') or is_page_template('page-gallery.php') or is_category( categories_subchildren(8) ) or is_single() or is_search() or is_tag() ) echo 'made_by_black'; ?> clearfix">
						<span>Разработка сайта:</span>
						<a href="http://www.crepla.com/">
							<div class="manufacturer"></div>
						</a>
					</div>
				</footer>
				<!--footer end-->
			
			<?php endif; ?>
			
		<?php if( !is_page_template('page-contacts.php') ): ?>
		</div>
		<?php endif; ?>
	
		<?php wp_footer(); ?>
	</body>
</html>