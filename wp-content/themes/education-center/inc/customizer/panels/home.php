<?php
/**
 * Front Page Settings
 * 
 * @package Education_Center
 */

function education_center_customize_register_frontpage( $wp_customize ) {
	
    /** Front Page Settings */
    $wp_customize->add_panel( 
        'frontpage_settings',
         array(
            'priority'    => 60,
            'capability'  => 'edit_theme_options',
            'title'       => esc_html__( 'Front Page Settings', 'education-center' ),
            'description' => esc_html__( 'Static Home Page settings.', 'education-center' ),
        ) 
    );    
      
}
add_action( 'customize_register', 'education_center_customize_register_frontpage' );