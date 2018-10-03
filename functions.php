<?php
/**
 * listiry functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package listiry
 */

if ( ! function_exists( 'listiry_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function listiry_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on listiry, use a find and replace
		 * to change 'listiry' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'listiry', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menu('primary',__('Primary menu','listiry'));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'listiry_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'listiry_setup' );
function listiry_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'listiry_custom_excerpt_length');
function listiry_new_excerpt_more( $excerpt ) {
	return '...';
}
add_filter( 'excerpt_more', 'listiry_new_excerpt_more' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function listiry_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'listiry_content_width', 640 );
}
add_action( 'after_setup_theme', 'listiry_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function listiry_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'listiry' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'listiry' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( [
		'name'          => esc_html__( 'Footer Sidebar', 'listiry' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here.', 'listiry' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	] );
}
add_action( 'widgets_init', 'listiry_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function listiry_scripts() {
	wp_enqueue_style( 'listiry-style', get_stylesheet_uri() );
	wp_enqueue_style('font-awesome' , 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' , 'all');
	wp_enqueue_style('ionicon' , 'https://unpkg.com/ionicons@4.4.4/dist/css/ionicons.min.css' , 'all');
	wp_enqueue_style('font-cabin' , 'https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i' , 'all');
	wp_enqueue_style('bootstrap-grid' , get_template_directory_uri().'/css/bootstrap-grid.css','all');
	wp_enqueue_script( 'listiry-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true );

	wp_enqueue_script( 'listiry-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), null, true );
	wp_enqueue_script( 'listiry_script', get_template_directory_uri() . '/js/listiry.js', array('jquery'), null, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'listiry_scripts' );
if ( ! function_exists( 'listiry_logo' ) ) {
	function listiry_logo(){
		$logo_id=get_theme_mod('custom_logo');
		$default_logo = get_template_directory_uri();
		if ( !empty($logo_id) ) {
			$image = wp_get_attachment_image_src( $logo_id , 'full' );
			$image_src=$image[0];
		}
		else{
			$image_src = $default_logo.'/image/13.png';
		}
		?>
		
		<div class="logo-header">
			<a href="<?php echo esc_url(home_url()) ?>">
				<img src="<?php echo esc_url( $image_src ) ; ?>" alt="<?php esc_attr_e( 'Logo' , 'listiry' ); ?>">
			</a>
		</div>
		<?php
	}
}
if ( ! function_exists( 'listiry_menu' ) ) {
	function listiry_menu()
	{
		if ( has_nav_menu( 'primary' ) ) {
			$menu = array(
				'theme_location' => 'primary',
				'container'       => 'nav',
				'container_class' => 'main-menu',
				'container_id'    => 'site-navigation',
				'menu_id'         => 'nav-menu',
				'menu_class'      => 'navbar-menu',
			);
			wp_nav_menu( $menu );
		}
	}
}
if ( ! function_exists( 'listiry_user_login' ) ) {
	function listiry_user_login(){
		// echo "<pre>";
		// var_dump( get_users( [ 'orderby' => 'login' ] ) );
		// var_dump( wp_get_current_user() );die();
		$user = wp_get_current_user();
		$id_user = $user->ID;
		?>
		<?php if ( !empty($id_user) ): 
			$display_name = $user->data->display_name;
		?>
			<div class="user">
				<div class="line">
					<?php echo get_avatar( $id_user , 30 ); ?>
					<div class="name">
						<p><a href="<?php echo '#' ?>"><?php echo 'Hi, '.$display_name; ?></a></p>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="user">
				<div class="sing-in">
					<a href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e( ' Sing in' , 'listiry' ); ?></a>
				</div>
			</div>
		<?php endif ?>
		<?php
		
	}
}
if ( ! function_exists( 'listiry_breadcrumbs' ) ) {
	function listiry_breadcrumbs(){
		?>
		<ul>
			<li><a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Home' , 'listiry' ); ?></a></li>
			<li><?php echo esc_attr( 'Pages' ) ?></li>
		<?php
		if ( is_home() ) { 
		?>
			<li class="page-active"><?php echo esc_html( 'Blog', 'listiry' ) ?></li>
		<?php
		}
		if ( is_page() ) { 
		?>
			<li class="page-active"><?php echo esc_html( get_the_title() ) ?></li>
		<?php
		}
		if ( is_single() ) { 
		?>
			<li class="page-active"><?php echo esc_html( 'Blog Single' ) ?></li>
		<?php
		}
		if ( is_archive() ) { 
		?>
			<li class="page-active"><?php echo esc_html( 'Archive' ) ?></li>
		<?php
		}
		echo "</ul>";
	}
}
if ( ! function_exists( 'listiry_thumbnail' ) ) {
	function listiry_thumbnail(){
		if ( has_post_thumbnail() || has_post_format( 'image' ) ) {
		?>
			<div class="post-thumbnail <?php echo is_single() ? 'fw thumbnail-single-fw' : ''; ?>">
			<?php if( ! is_single() ){ ?>
				<a href="<?php echo esc_url( the_permalink() ); ?>" class="<?php echo is_sticky() ? 'sticky' : '' ?>">
					<?php echo the_post_thumbnail('large'); ?>
				</a>
			<?php 
			}
			else{?>
				<?php echo the_post_thumbnail('large'); ?>
			</div>
			<?php
			}
		}
	}
}
if ( ! function_exists( 'listiry_entry_title' ) ) {
	function listiry_entry_title(){
		if ( is_single() ) {
			?>
			<h1 class="post-title">
				<?php echo esc_html( get_the_title() ) ?>
			</h1>
			<?php
		}
		else{
			?>
			<h2 class="post-title">
				<a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
			</h2>
			<?php
		}
	}
}
if ( ! function_exists( 'listiry_entry_content' ) ) {
	function listiry_entry_content(){
		if ( ! is_single() ) {
		?>
			<div class="post-entry-content">
				<?php the_excerpt(); ?>
			</div>
		<?php
		}
		else{
		?>
			<div class="post-entry-content-single">
				<?php the_content(); ?>
			</div>
		<?php
		}
	}
}
if ( ! function_exists( 'listiry_post_time' ) ) {
	function listiry_post_time(){
		$d = get_the_time('d');
		$m = get_the_time('m');
		$y = get_the_time( 'Y' );
		?>
		<span class='time'><a href="<?php echo get_day_link( $y, $m, $d ) ?>"><?php esc_html(the_time('M d, Y')); ?></a></span>
		<?php
	}
}
if ( ! function_exists( 'listiry_post_category' ) ) {
	function listiry_post_category(){
		// var_dump(get_the_category());
		$category = get_the_category();
		?>
		<div class='category-post'><a href="<?php echo get_category_link( $category[0]->term_id ) ?>"><span><?php esc_html( 'By' ) ?> </span><?php echo esc_html( $category[0]->name ); ?></a></div>
		<?php
	}
}
if ( ! function_exists( 'listiry_post_author' ) ) {
	function listiry_post_author(){
		// var_dump(the_author_link());
		// echo get_the_author_posts_link();
		?>
		<div class='author-post'><span>By <?php echo get_the_author_posts_link(); ?></span></div>
		<?php
	}
}
if ( ! function_exists( 'listiry_post_tag' ) ) {
	function listiry_post_tag(){
		?>
		<div class='tag-post'><?php echo get_the_tag_list() ; ?></div>
		<?php
	}
}
if ( ! function_exists( 'listiry_logo_comming_soon' ) ) {
	function listiry_logo_comming_soon(){

		$default_logo = get_template_directory_uri();
		if ( !empty($logo_id) ) {
			$image_src=get_theme_mod('logo-page');
		}
		else{
			$image_src = $default_logo.'/image/17.png';
		}
		?>
		<header class="logo-page">
			<a href="<?php echo esc_url(home_url()) ?>">
				<img src="<?php echo esc_url( $image_src ) ; ?>" alt="<?php esc_attr_e( 'Logo' , 'listiry' ); ?>">
			</a>
		</header>
		<?php
	}
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

