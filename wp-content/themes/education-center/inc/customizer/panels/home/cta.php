<?php
/**
 * Cta Settings
 *
 * @package Education_Center
 */
if ( ! function_exists( 'education_center_customize_register_home_cta' ) ) :

function education_center_customize_register_home_cta( $wp_customize ){

    /** CTA Section Settings  */
    $wp_customize->add_section(
        'cta_section',
        array(
            'title'    => __( 'CTA Section', 'education-center' ),
            'priority' => 30,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Enable CTA Section */
    $wp_customize->add_setting( 
        'ed_cta', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Toggle_Control( 
			$wp_customize,
			'ed_cta',
			array(
				'section'     => 'cta_section',
				'label'	      => __( 'Enable CTA Section', 'education-center' ),
                'description' => __( 'Enable to show CTA section in your homepage', 'education-center' ),
			)
		)
	);

    /** Title Text */
    $wp_customize->add_setting( 
        'cta_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'cta_title',
        array(
            'section'         => 'cta_section',
            'label'           => __( 'Section Title', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'cta_title', array(
        'selector'        => '.home .cta h2.cta__title',
        'render_callback' => 'education_center_get_cta_title',
    ) );

    /** Description Text */
    $wp_customize->add_setting( 
        'cta_subtitle', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'cta_subtitle',
        array(
            'section'         => 'cta_section',
            'label'           => __( 'Section Subtitle', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'cta_subtitle', array(
        'selector'        => '.home .cta .cta__text',
        'render_callback' => 'education_center_get_cta_subtitle',
    ) );

    /** CTA Background Image */
	$wp_customize->add_setting( 
		'cta_background_image', 
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
    	)
	);
 
    $wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'cta_background_image', 
			array(
				'label'      => __( 'Upload a background image', 'education-center' ),
				'section'    => 'cta_section',
			)
    	)
	);

    /** Contact Button Label */
    $wp_customize->add_setting(
        'cta_contact_lbl',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field', 
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'cta_contact_lbl',
        array(
            'type'            => 'text',
            'section'         => 'cta_section',
            'label'           => __( 'Button Label', 'education-center' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'cta_contact_lbl', array(
        'selector'        => '.home .cta .cta__btn .btn.btn-lg',
        'render_callback' => 'education_center_get_cta_contact_lbl',
    ) );

    /** View More Link */
    $wp_customize->add_setting(
        'cta_contact_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'cta_contact_link',
        array(
            'label'           => __( 'Button Link', 'education-center' ),
            'description'     => __( 'The link opens in a new tab', 'education-center' ),
            'section'         => 'cta_section',
            'type'            => 'text',
        )
    );

}
endif;
add_action( 'customize_register', 'education_center_customize_register_home_cta' );