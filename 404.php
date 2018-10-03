<?php /* Template Name: 404 */ ?>
<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package listiry
 */

get_header();
?>
	<section class="error-404 t-center">
		<div class="container">
			<h1 class="error-404__title"><?php echo esc_attr( '404' ); ?></h1>
			<p class="error-404__subtitle"><?php esc_html_e( 'Oops. Sorry, we can\'t find that page!' , 'listiry' ) ?></p>
			<a class="error-404__button" href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( 'Go Back Home' ); ?></a>
		</div>
	</section>
<?php
get_footer();
