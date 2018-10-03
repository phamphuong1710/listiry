<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
	<div class="container">

		<div class="row">
			<div class="col-md-6 map">
				<h1><?php echo esc_html('Our Location'); ?></h1>
				<?php echo get_theme_mod('location') ?>
			</div>
			<div class="col-md-6 form-contact">
				<h1><?php echo esc_html('Contact Us'); ?></h1>
				<?php echo do_shortcode( get_theme_mod('form_contact')) ?>
				
			</div>
		</div>
	</div>
<?php get_footer(); ?>