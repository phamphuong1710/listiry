<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package listiry
 */

?>
		<div class="<?php echo ( ! is_single() ) ? 'col-md-4' : 'col-md-12'; ?>">
			<article id="post-<?php the_ID(); ?>" <?php post_class(is_sticky() ? 'sticky' : ''); ?>>
			<?php 
				listiry_thumbnail();
			?>
				<div class="<?php echo ( is_single() ? 'row' : 'content-post' ); ?>">
					<div class="<?php echo ( is_single() ? 'col-md-8 post-single-content' : '' ); ?>">
					<?php
						listiry_entry_title();
						if ( is_single() ) {
					?>
						<div class="info-post">
						<?php
							listiry_post_time();
							listiry_post_author();
						?>
						</div>
						<?php
						}
						?>
						<div class="entry-content">
							<?php 
								listiry_entry_content();
								if ( ! is_single() ) {
									?>
									<div class="info-post">
										<?php
										listiry_post_time();
										listiry_post_category();
										?>
									</div>
								<?php
								}
							?>
						</div><!-- .entry-content -->
						<?php if ( is_sticky() ) {
						?>
							<span class="is-sticky">
								<?php echo esc_html( 'STICKY' ) ?>
							</span>
						<?php
						} ?>

						<div class="highlight">
						<?php 
							if ( is_single() ) {
								listiry_post_tag();
						?>
							<ul class="min-list inline-list social-list">
								<li>
									<a href="#">
									  <i class="fa fa-facebook-f"></i>
									</a>
								</li>
								<li>
									<a href="#">
									  <i class="fa fa-twitter"></i>
									</a>
								</li>
								<li>
									<a href="#">
									  <i class="fa fa-pinterest"></i>
									</a>
								</li>
								<li>
									<a href="#">
									  <i class="fa fa-google-plus"></i>
									</a>
								</li>
								<li>
									<a href="#">
									  <i class="fa fa-linkedin"></i>
									</a>
								</li>
								<li>
									<a href="#">
									  <i class="fa fa-instagram"></i>
									</a>
								</li>
							</ul>
						<?php
							}
						?>
						</div>
							<?php 
								if ( is_single() ) {
									the_post_navigation();
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								}
								
							?>

					</div>
				</div>
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
