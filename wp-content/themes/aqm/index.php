<?php				
	$get_services_list = get_categories( array(
		'type'       => 'post',
		'taxonomy'   => 'services',
		'child_of'   => 0,
		'orderby'    => 'name',
		'order'      => 'ASC',
		'hide_empty' => 0,
	));
?>
<?php get_header(); ?>
<!--index begin--><?php echo do_shortcode('[af_shortcode]'); ?>
<div class="index">
	<div class="wrapper">
		<div class="caption">
			<h1 class="animated"><?php the_field( 'main_title', 'option' ) ?></h1>
			<button class="animated">Получить консультацию</button>
			<span>Выберите свой вариант</span>
			<div class="figures"></div>
		</div>
		<div class="variants">
			<ul>
				<?php foreach( $get_services_list as $index => $value ): ?>
				<li class="animated">
					<a href="<?php echo get_home_url() . '/services/' . $value->slug; ?>">
						<div class="variant">
							<span><?php echo title_slice( $value->name )[0]; ?></span>
							<span><?php echo title_slice( $value->name )[1]; ?></span>
						</div>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
<!--index end-->
<?php get_footer(); ?>