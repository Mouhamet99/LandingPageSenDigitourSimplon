<?php
/**
 * Header Settings
 *
 * @package Education_Center
 */
if ( ! function_exists( 'education_center_customize_register_general_header' ) ) :

function education_center_customize_register_general_header( $wp_customize ) {
    
    /** Header Settings */
    $wp_customize->add_section(
        'header_settings',
        array(
            'title'    => __( 'Header Settings', 'education-center' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    );

    /** Search Header */
    $wp_customize->add_setting(
        'ed_header_search',
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Education_Center_Toggle_Control(
            $wp_customize,
            'ed_header_search',
            array(
                'section'       => 'header_settings',
                'label'         => __( 'Header Search', 'education-center' ),
                'description'   => __( 'Enable to show search in header', 'education-center' ),
            )
        )	
    );

    /** Transparent Header */
    $wp_customize->add_setting(
        'ed_transparent_header',
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Education_Center_Toggle_Control(
            $wp_customize,
            'ed_transparent_header',
            array(
                'section'       => 'header_settings',
                'label'         => __( 'Transparent Header', 'education-center' ),
                'description'   => __( 'Enable to make header transparent in the front page.', 'education-center' ),
            )
        )	
    );

    /** Phone Number  */
    $wp_customize->add_setting(
        'phone',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );

    $wp_customize->add_control(
        'phone',
        array(
            'label'       => __( 'Phone Number', 'education-center' ),
            'description' => __( 'Add phone no. in header.', 'education-center' ),
            'section'     => 'header_settings',
            'type'        => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'phone', array(
        'selector'        => '.site-header .header-top .info .tel-link',
        'render_callback' => 'education_center_get_phone',
    ) );
    
    /** Email */
    $wp_customize->add_setting(
        'email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_email',
            'transport'			=> 'postMessage',
        )
    );
    

    $wp_customize->add_control(
        'email',
        array(
            'label'       => __( 'Email', 'education-center' ),
            'description' => __( 'Add email in header.', 'education-center' ),
            'section'     => 'header_settings',
            'type'        => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'email', array(
        'selector'        => '.site-header .header-top .info .email-link',
        'render_callback' => 'education_center_get_email',
    ) );
    
    $wp_customize->add_setting(
        'header_btn_lbl',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'header_btn_lbl',
        array(
            'label'             => __( 'Button Label', 'education-center' ),
            'section'           => 'header_settings',
            'type'              => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'header_btn_lbl', array(
        'selector'        => '.site-header .header-wrapper .nav-wrap a.btn-primary',
        'render_callback' => 'education_center_get_header_btn_lbl',
    ) );

    $wp_customize->add_setting(
        'header_btn_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'header_btn_link',
        array(
            'label'           => __( 'Button Link', 'education-center' ),
            'section'         => 'header_settings',
            'type'            => 'text',
        )
    ); 

    /** Sticky Header */
    $wp_customize->add_setting(
        'ed_social_links',
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Education_Center_Toggle_Control(
            $wp_customize,
            'ed_social_links',
            array(
                'section'       => 'header_settings',
                'label'         => __( 'Enable Social Links', 'education-center' ),
                'description'   => __( 'Enable to show social links at top. Social links are displayed in header layout one, three and seven only', 'education-center' ),
            )
        )	
    );
 
    // Social Share Repeater 
    $wp_customize->add_setting( 
        new Education_Center_Control_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => '',
                'sanitize_callback' => array( 'Education_Center_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Control_Repeater(
			$wp_customize,
			'social_links',
			array(
				'section'       => 'header_settings',
				'label'         => esc_html__( 'Social Links', 'education-center' ),
				'fields'  => array(
                    'icon' => array(
                        'type'        => 'select',
                        'label'       => esc_html__( 'Social Media', 'education-center' ),
                        'choices'     => education_center_get_svg_icons()
                    ),
                    'link' => array(
                        'type'        => 'url',
                        'label'       => esc_html__( 'Link', 'education-center' ),
                        'description' => esc_html__( 'Example: https://facebook.com', 'education-center' ),
                    ),
                    'checkbox' => array(
                        'type'        => 'checkbox',
                        'label'       => esc_html__( 'Open link in new tab', 'education-center' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => esc_html__( 'links', 'education-center' ),
                    'field' => 'link'
                ),
			)
		)
    );
    
    /** Header Settings Ends */
}
endif;
add_action( 'customize_register', 'education_center_customize_register_general_header' );