<?php /* Template Name: Comming Soon */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="container">
		<?php listiry_logo_comming_soon(); ?>
		<input type="hidden" id="comming_soon_date" value="<?php echo get_theme_mod( 'comming_soon_date' ); ?>">
		<section class="comming-soon">
			<h1><?php echo esc_html( 'We\'re coming soon...' ) ?></h1>
			<ul class="timer">
				<li class="day">
					<div class="timer-item">
						<span id="day"></span>
						<span><?php echo esc_html( 'Days' ) ?></span>
					</div>
				</li>
				<li>
					<div class="timer-item">
						<span id="hours"></span>
						<span><?php echo esc_html( 'Hours' ) ?></span>
					</div>
				</li>
				<li>
					<div class="timer-item">
						<span id="minutes"></span>
						<span><?php echo esc_html( 'Minutes' ) ?></span>
					</div>
				</li>
				<li>
					<div class="timer-item">
						<span id="seconds"></span>
						<span><?php echo esc_html( 'Seconds' ) ?></span>
					</div>
				</li>
			</ul>
		</section>
		<footer>
			<div class="container">
				<div class="form">
					<?php echo do_shortcode('[contact-form-7 id="32" title="Untitled"]'); ?>
					<span class="destination"><?php echo esc_html('Listiry is making finding destination faster, easier, and customized for you'); ?></span>
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
						<li>
							<a href="#">
								<i class="fa fa-youtube"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>

</html>