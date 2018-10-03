<?php
/**
 * listiry Theme Customizer
 *
 * @package listiry
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object. sanitize_text_field
 */
function listiry_customize_register($wp_customize){
	$wp_customize->add_section( "footer" , array(
		'title'       => __( "Footer" , "listiry" ),
		'priority'    => 130,
		'description' => __( 'Setting footer here' , 'listiry'),
		
		));
	$wp_customize->add_setting( "copy_right" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'listiry_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'copy_right',array(
		'label'    => __( 'Copyright', 'listiry' ),
		'section'  => 'footer',
		'settings' => 'copy_right',
		'type'     => 'text'
		)));
	$wp_customize->get_setting( 'copy_right' )->transport = 'postMessage';
	$wp_customize->add_setting( "list_contact" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'listiry_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'list_contact',array(
		'label'    => __( 'Lists Contact', 'listiry' ),
		'section'  => 'footer',
		'settings' => 'list_contact',
		'type'     => 'text'
		)));
	$wp_customize->get_setting( 'list_contact' )->transport = 'postMessage';

	$wp_customize->add_setting( 'footer_bg_color',array(
		'default'   => '#282828',
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'footer_bg_color' ,array(
		'label'    => 'Footer Background Color',
		'section'  => 'footer',
		'settings' => 'footer_bg_color',
	)));
	$wp_customize->get_setting( 'footer_bg_color' )->transport = 'postMessage';

	$wp_customize->add_setting( 'footer_bg_bottom_color',array(
		'default'           => '#222',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize , 'footer_bg-bottom_color' ,array(
		'label'    => 'Footer Copyright Background Color',
		'section'  => 'footer',
		'settings' => 'footer_bg_bottom_color',
	)));
	$wp_customize->get_setting( 'footer_bg_bottom_color' )->transport = 'postMessage';

	$wp_customize->add_section( "contact" , array(
		'title'       => __( "Contact Page" , "listiry" ),
		'priority'    => 130,
		'description' => __( 'Setting Contact here' , 'listiry'),
		
		));
	$wp_customize->add_setting( "location" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'listiry_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'location',array(
		'label'    => __( 'Location', 'listiry' ),
		'section'  => 'contact',
		'settings' => 'location',
		'type'     => 'text'
		)));
	$wp_customize->get_setting( 'location' )->transport = 'postMessage';
	$wp_customize->add_setting( "form_contact" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'listiry_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'form_contact',array(
		'label'    => __( 'Lists Contact', 'listiry' ),
		'section'  => 'contact',
		'settings' => 'form_contact',
		'type'     => 'text'
		)));
	$wp_customize->get_setting( 'form_contact' )->transport = 'postMessage';


	$wp_customize->add_section( "comming_soon" , array(
		'title'       => __( "Comming Soon Page Setting" , "listiry" ),
		'priority'    => 130,
		'description' => __( 'Setting comming soon here' , 'listiry'),
	));
	$wp_customize->add_setting( "logo_page" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url',
		));
	$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize,'logo_page',array(
		'label'    => __( 'Logo in comming soon page', 'listiry' ),
		'section'  => 'comming_soon',
		'settings' => 'logo_page',
		)));
	$wp_customize->get_setting( 'logo_page' )->transport = 'postMessage';

		$wp_customize->add_setting( "comming_soon_date" ,array(
		'default'    => '' ,
		'transport' => 'refresh',
		'sanitize_callback' => 'listiry_text_field',
		));
	$wp_customize->add_control( new WP_Customize_Control($wp_customize,'comming_soon_date',array(
		'label'    => __( 'Setting timer', 'listiry' ),
		'section'  => 'comming_soon',
		'settings' => 'comming_soon_date',
		'type'     => 'date',
		)));
	$wp_customize->get_setting( 'comming_soon_date' )->transport = 'postMessage';
}
add_action( 'customize_register','listiry_customize_register' );
function get_customize_style() {
	$color = get_theme_mods();
	?>
	<style>
		footer .site-info{
			background-color: <?php echo $color['footer_bg_color']; ?>
		}
		footer .bottom-footer{
			background-color: <?php echo $color['footer_bg_bottom_color']; ?>
		}
	</style>
	<?php

}
add_action('wp_head','get_customize_style');
function listiry_text_field($str){
	return $str;
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function listiry_customize_preview_js() {
	wp_enqueue_script( 'listiry-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery','customize-preview' ), null, true );
}
add_action( 'customize_preview_init', 'listiry_customize_preview_js' );
