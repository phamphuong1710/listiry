<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package listiry
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container">
				<?php 
					if ( is_active_sidebar( 'sidebar-footer' ) ) {
						dynamic_sidebar( 'sidebar-footer' );
					}
					else{
						esc_html_e( 'Please setting in widgets' , 'listiry' );
					}
				?>
			</div>
		</div><!-- .site-info -->
		<div class="bottom-footer">
			<div class="container">
				<div class="copyright">
					<div class="copy-right">
						<?php echo get_theme_mod('copy_right'); echo get_theme_mod('listiry_location')?>
					</div>
					<div class="menu-footer">
						<?php echo get_theme_mod('list_contact'); ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
