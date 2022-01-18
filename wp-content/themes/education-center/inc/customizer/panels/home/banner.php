<?php
/**
 * Banner Section
 *
 * @package Education_Center
 */

function education_center_customize_register_frontpage_banner( $wp_customize ) {
	
    $wp_customize->get_section( 'header_image' )->panel                    = 'frontpage_settings';
    $wp_customize->get_section( 'header_image' )->title                    = esc_html__( 'Banner Section', 'education-center' );
    $wp_customize->get_section( 'header_image' )->priority                 = 10;
    $wp_customize->get_control( 'header_image' )->active_callback          = 'education_center_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback          = 'education_center_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'education_center_banner_ac';
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'static_banner',
			'sanitize_callback' => 'education_center_sanitize_select'
		)
	);

	$wp_customize->add_control(
        'ed_banner_section',
        array(
            'label'	      => esc_html__( 'Banner Options', 'education-center' ),
            'description' => esc_html__( 'Choose banner as static image/video or as a slider.', 'education-center' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'no_banner'        => esc_html__( 'Disable Banner Section', 'education-center' ),
                'static_banner'    => esc_html__( 'Static/Video CTA Banner', 'education-center' ),
            ),
            'priority'      => 5,
        )            
	);
    
     /** Banner Overlay */
     $wp_customize->add_setting(
        'ed_banner_overlay',
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Education_Center_Toggle_Control(
            $wp_customize,
            'ed_banner_overlay',
            array(
                'section'       => 'header_image',
                'label'         => __( 'Banner Overlay', 'education-center' ),
                'description'   => __( 'Enable to add overaly on the banner', 'education-center' ),
                'active_callback'   => 'education_center_banner_ac'
            )
        )	
    );

    /** Sub Title */
    $wp_customize->add_setting(
        'banner_subtitle',
        array(
            'default'           => esc_html__( 'Welcome to SCU', 'education-center' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_subtitle',
        array(
            'label'           => esc_html__( 'Sub Title', 'education-center' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback'   => 'education_center_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
        'selector'        => '.cta-banner .banner__stitle',
        'render_callback' => 'education_center_banner_subtitle',
    ) );

    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default'           => esc_html__( 'SCU is the One Stop for all Students.', 'education-center' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_title',
        array(
            'label'           => esc_html__( 'Title', 'education-center' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback'   => 'education_center_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector'        => '.cta-banner .banner__title',
        'render_callback' => 'education_center_banner_title',
    ) );
    
    /** Content */
    $wp_customize->add_setting(
        'banner_content',
        array(
            'default'           => esc_html__( 'Take your learning organisation to the next level.', 'education-center' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_content',
        array(
            'label'           => esc_html__( 'Description', 'education-center' ),
            'section'         => 'header_image',
            'type'            => 'textarea',
            'active_callback'   => 'education_center_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_content', array(
        'selector'        => '.cta-banner .banner-desc',
        'render_callback' => 'education_center_banner_content',
    ) );

    /** Banner Button Label */
    $wp_customize->add_setting(
        'banner_btn_label',
        array(
            'default'           => esc_html__( 'See Courses', 'education-center' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_btn_label',
        array(
            'label'           => esc_html__( 'Button Label', 'education-center' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback'   => 'education_center_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_btn_label', array(
        'selector'        => '.cta-banner .btn-wrap .btn-primary',
        'render_callback' => 'education_center_banner_btn_label',
    ) );
    
    /** Banner Link */
    $wp_customize->add_setting(
        'banner_link',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_link',
        array(
            'label'           => esc_html__( 'Button Link', 'education-center' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback'   => 'education_center_banner_ac'
        )
    );

    /** Banner Button Label */
    $wp_customize->add_setting(
        'banner_btn_two_label',
        array(
            'default'           => esc_html__( 'Start Trial', 'education-center' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_btn_two_label',
        array(
            'label'           => esc_html__( 'Button Two Label', 'education-center' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback'   => 'education_center_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_btn_two_label', array(
        'selector'        => '.cta-banner .btn-wrap .btn-tertiary',
        'render_callback' => 'education_center_banner_btn_two_label',
    ) );
    
    /** Banner Link */
    $wp_customize->add_setting(
        'banner_link_two',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_link_two',
        array(
            'label'           => esc_html__( 'Button Link', 'education-center' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback'   => 'education_center_banner_ac'
        )
    );

    $wp_customize->add_setting(
        'banner_newsletter',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'banner_newsletter',
        array(
            'label'             => __( 'Newsletter Shortcode', 'education-center' ),
            'description'       => __( 'Please download BlossomThemes Email Newsletter and place the shortcode for newsletter section', 'education-center' ),
            'type'              => 'text',
            'section'           => 'header_image',
            'active_callback'   => 'education_center_banner_ac'
        )
    ); 

}
add_action( 'customize_register', 'education_center_customize_register_frontpage_banner' );