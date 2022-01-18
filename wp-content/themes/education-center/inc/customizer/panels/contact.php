<?php
/**
 * Contact Page Theme Option.
 * 
 * @package Education_Center
 */
    
function education_center_customize_register_contact( $wp_customize ) {
    
    /** contact Page Settings */
    $wp_customize->add_panel( 
        'contact_page_settings',
         array(
            'priority'    => 60,
            'title'       => __( 'Contact Page Settings', 'education-center' ),
            'description' => __( 'Customize contact Page Sections', 'education-center' ),
        ) 
    );

}
add_action( 'customize_register', 'education_center_customize_register_contact' );