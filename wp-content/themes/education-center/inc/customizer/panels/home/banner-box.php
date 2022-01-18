<?php
/**
 * Banner Section
 *
 * @package Education_Center
 */

function education_center_customize_register_frontpage_banner_box( $wp_customize ) {
    
    /** Banner Box Settings  */
    $wp_customize->add_section(
        'banner_box',
        array(
            'title'    => __( 'Banner Box Section', 'education-center' ),
            'priority' => 12,
            'panel'    => 'frontpage_settings',
        )
    );
 
    /** Enable Banner Box Section */
    $wp_customize->add_setting( 
        'ed_banner_box', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Toggle_Control( 
			$wp_customize,
			'ed_banner_box',
			array(
				'section'     => 'banner_box',
				'label'	      => __( 'Enable Banner Box Section', 'education-center' ),
                'description' => __( 'Enable to show banner box section in your homepage', 'education-center' ),
			)
		)
	);
    
    // Banner Icon Text Repeater 
    $wp_customize->add_setting( 
        new Education_Center_Control_Repeater_Setting( 
            $wp_customize, 
            'banner_icon_text', 
            array(
                'default'           => '',
                'sanitize_callback' => array( 'Education_Center_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );

    $wp_customize->add_control(
        new Education_Center_Control_Repeater(
            $wp_customize,
            'banner_icon_text',
            array(
                'section' => 'banner_box',
                'label'   => esc_html__( 'Icon Text', 'education-center' ),
                'fields'  => array(
                    'icon' => array(
                        'type'        => 'image',
                        'label'       => esc_html__( 'Upload an icon image', 'education-center' ),
                        'description' => esc_html__( 'Recommended icon size is 47px by 60px in png format', 'education-center' )
                    ),
                    'title' => array(
                        'type'        => 'text',
                        'label'       => esc_html__( 'Enter Title', 'education-center' ),
                    ),
                    'description' => array(
                        'type'        => 'text',
                        'label'       => esc_html__( 'Enter short description', 'education-center' ),
                    ),
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => esc_html__( 'Icon Text', 'education-center' ),
                    'field' => 'text'
                ),                     
            )
        )
    );
}
add_action( 'customize_register', 'education_center_customize_register_frontpage_banner_box' );