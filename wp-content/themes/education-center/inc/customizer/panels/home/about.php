<?php
/**
 * About Settings
 *
 * @package Education_Center
 */
if ( ! function_exists( 'education_center_customize_register_home_about' ) ) :

function education_center_customize_register_home_about( $wp_customize ){

    /** About Section Settings  */
    $wp_customize->add_section(
        'about_section',
        array(
            'title'    => __( 'About Section', 'education-center' ),
            'priority' => 15,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Enable About Section */
    $wp_customize->add_setting( 
        'ed_about', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Toggle_Control( 
			$wp_customize,
			'ed_about',
			array(
				'section'     => 'about_section',
				'label'	      => __( 'Enable About Section', 'education-center' ),
                'description' => __( 'Enable to show about section in your homepage', 'education-center' ),
			)
		)
	);

    /** Title Text */
    $wp_customize->add_setting( 
        'about_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'about_title',
        array(
            'section'         => 'about_section',
            'label'           => __( 'Section Title', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'about_title', array(
        'selector'        => '.home .site .about .section-header h2.section-header__title',
        'render_callback' => 'education_center_get_about_title',
    ) );

    /** Subtitle Text */
    $wp_customize->add_setting( 
        'about_subtitle', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'about_subtitle',
        array(
            'section'         => 'about_section',
            'label'           => __( 'Section Subtitle', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'about_subtitle', array(
        'selector'        => '.home .site .about .section-header .section-header__info',
        'render_callback' => 'education_center_get_about_subtitle',
    ) );

    /** About Content */
    $wp_customize->add_setting( 
        'about_content', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'wp_kses_post',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'about_content',
        array(
            'section'         => 'about_section',
            'label'           => __( 'Section Description', 'education-center' ),
            'type'            => 'textarea',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'about_content', array(
        'selector'        => '.home .site .about .about__intro p',
        'render_callback' => 'education_center_get_about_content',
    ) );

    /** View More Label */
    $wp_customize->add_setting(
        'viewmore_lbl',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field', 
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'viewmore_lbl',
        array(
            'type'            => 'text',
            'section'         => 'about_section',
            'label'           => __( 'View More Text', 'education-center' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'viewmore_lbl', array(
        'selector'        => '.home .site .about .about__intro a.btn-primary',
        'render_callback' => 'education_center_get_viewmore_lbl',
    ) );

    /** View More Link */
    $wp_customize->add_setting(
        'viewmore_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'viewmore_link',
        array(
            'label'           => __( 'View More Link', 'education-center' ),
            'section'         => 'about_section',
            'type'            => 'text',
        )
    );

    /** About Featured Image */
	$wp_customize->add_setting( 
		'about_featured_image', 
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
    	)
	);
 
    $wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'about_featured_image', 
			array(
				'label'      => __( 'Upload the image', 'education-center' ),
				'section'    => 'about_section',
			)
    	)
	);

}
endif;
add_action( 'customize_register', 'education_center_customize_register_home_about' );