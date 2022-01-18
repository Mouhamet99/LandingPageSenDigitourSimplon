<?php
/**
 * General Settings
 *
 * @package Education_Center
 */
if ( ! function_exists( 'education_center_customize_register_general' ) ) :
    
function education_center_customize_register_general( $wp_customize ){
    
    /** General Settings */
    $wp_customize->add_panel( 
        'general_settings',
         array(
            'priority'    => 50,
            'capability'  => 'edit_theme_options',
            'title'       => __( 'General Settings', 'education-center' ),
            'description' => __( 'Customize Header, Social, Sharing, SEO, Post/Page, Newsletter, Performance and Miscellaneous settings.', 'education-center' ),
        ) 
    );
    
}
endif;
add_action( 'customize_register', 'education_center_customize_register_general' );