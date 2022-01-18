<?php
/**
 * Education Center Theme Customizer
 *
 * @package Education_Center
 */

 /**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function education_center_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
	$wp_customize->get_setting( 'background_image' )->transport = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'education_center_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'education_center_customize_partial_blogdescription',
			)
		);
	}

}
add_action( 'customize_register', 'education_center_customize_register' );

function education_center_customize_script(){

    wp_enqueue_style( 'education-center-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), EDUCATION_CENTER_THEME_VERSION );
	wp_enqueue_script( 'education-center-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), EDUCATION_CENTER_THEME_VERSION, true );

}
add_action( 'customize_controls_enqueue_scripts', 'education_center_customize_script' );

$education_center_panels  = array( 'general', 'home', 'contact' );

$education_center_sections  = array( 'layout', 'theme-info', 'footer' );

$education_center_sub_sections = array(
	'general'		=> array ( 'header', 'appearance', 'seo', 'post-page' ),
	'home'			=> array ( 'banner', 'banner-box', 'about', 'course-feature', 'blog-posts', 'cta', 'video', 'featured' ),
	'contact'		=> array ( 'contact-detail', 'contact-form', 'contact-map' ),
);

foreach( $education_center_panels as $panel ){
    require get_template_directory() . '/inc/customizer/panels/' . $panel . '.php';
}

foreach( $education_center_sub_sections as $sub => $sec ){
    foreach( $sec as $sections ){        
        require get_template_directory() . '/inc/customizer/panels/' . $sub . '/' . $sections . '.php';
    }
}

foreach( $education_center_sections as $section ){
    require get_template_directory() . '/inc/customizer/section/' . $section . '.php';
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function education_center_customize_preview_js() {
	wp_enqueue_script( 'education-center-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), EDUCATION_CENTER_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'education_center_customize_preview_js' );

/**
 * Add misc inline scripts to our controls.
 *
 * We don't want to add these to the controls themselves, as they will be repeated
 * each time the control is initialized.
 */
function education_center_control_inline_scripts() {

	wp_enqueue_style('education-center-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), EDUCATION_CENTER_THEME_VERSION );
	wp_enqueue_script('education-center-customize', get_template_directory_uri() . '/inc/js/customize.js', array('jquery', 'customize-controls'), EDUCATION_CENTER_THEME_VERSION, true);
}
add_action( 'customize_controls_enqueue_scripts', 'education_center_control_inline_scripts', 100 );

/**
 * Sanitization functions
 */
require get_template_directory() . '/inc/customizer/sanitization-functions.php';
/**
 *Active callback functions
 */
require get_template_directory() . '/inc/customizer/active-callback.php';
/**
 * Partial Refresh Functions
 */
require get_template_directory() . '/inc/customizer/partial-refresh.php';