<?php
/**
 * Appearance Settings
 *
 * @package Education_Center
 */

if ( ! function_exists( 'education_center_customize_register_appearance' ) ) :

function education_center_customize_register_appearance( $wp_customize ) {

    $wp_customize->get_section( 'colors' )->panel               = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->panel     = 'appearance_settings';

    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'education-center' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change color and body background.', 'education-center' ),
        ) 
    );

}
add_action( 'customize_register', 'education_center_customize_register_appearance' );
endif;