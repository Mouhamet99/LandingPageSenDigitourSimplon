<?php
/**
 * education center pro Custom Control
 * 
 * @package education_center
*/

if( ! function_exists( 'education_center_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function education_center_register_custom_controls( $wp_customize ){    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';    
            
    // Register the control type.
    $wp_customize->register_control_type( 'Education_Center_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Education_Center_Toggle_Control' );
}
endif;
add_action( 'customize_register', 'education_center_register_custom_controls' );