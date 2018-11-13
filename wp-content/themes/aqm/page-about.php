<?php
/*
 * Template Name: О нас
 */
?>

<?php  get_header(); ?>

<div class="about_wrapper">
	<div class="about">
		<div class="woman">
			<div class="woman_text">
				<?php the_field( 'title_about', 'option' ); ?>
			</div>
		</div>
		
		<div class="help">
			<?php the_field( 'content_about', 'option' ); ?>
		</div>
	</div>
</div>

<?php  get_footer(); ?>
