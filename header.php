<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package listiry
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'listiry' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="main-header">
			<?php 
				listiry_logo();
				listiry_menu();
				listiry_user_login();
			?>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-align-justify"></i></button>
		</div>
		
	</header>

	<div id="content" class="site-content">
		<div class="container">
			<div class="breadcrumbs">
				<?php listiry_breadcrumbs(); ?>
			</div>
		</div>