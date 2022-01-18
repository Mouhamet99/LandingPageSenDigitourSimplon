<?php
/**
 * Featured Courses Settings
 *
 * @package Education_Center
 */
if ( ! function_exists( 'education_center_customize_register_featured_courses' ) ) :

function education_center_customize_register_featured_courses( $wp_customize ){

    /** Featured Courses Section Settings  */
    $wp_customize->add_section(
        'featured_courses_section',
        array(
            'title'    => __( 'Featured Courses Section', 'education-center' ),
            'priority' => 35,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Enable Featured Course Section */
    $wp_customize->add_setting( 
        'ed_feat_course', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Toggle_Control( 
			$wp_customize,
			'ed_feat_course',
			array(
				'section'     => 'featured_courses_section',
				'label'	      => __( 'Enable Featured Course Section', 'education-center' ),
                'description' => __( 'Enable to show featured course section in your homepage. To view featured courses, please activate Tutor LMS plugin', 'education-center' ),
			)
		)
	);

    /** Title Text */
    $wp_customize->add_setting( 
        'courses_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'courses_title',
        array(
            'section'         => 'featured_courses_section',
            'label'           => __( 'Section Title', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'courses_title', array(
        'selector'        => '.home .f-course .section-header h2.section-header__title',
        'render_callback' => 'education_center_get_courses_title',
    ) );

    /** Subtitle Text */
    $wp_customize->add_setting( 
        'courses_subtitle', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'courses_subtitle',
        array(
            'section'         => 'featured_courses_section',
            'label'           => __( 'Section Subtitle', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'courses_subtitle', array(
        'selector'        => '.home .f-course .section-header span.section-header__info',
        'render_callback' => 'education_center_get_courses_subtitle',
    ) );

    /** Enroll Button Label */
    $wp_customize->add_setting(
        'courses_btn_lbl',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field', 
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'courses_btn_lbl',
        array(
            'type'            => 'text',
            'section'         => 'featured_courses_section',
            'label'           => __( 'Button Label', 'education-center' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'courses_btn_lbl', array(
        'selector'        => '.home .f-course .f-grid .f-wrap__bottom a.btn-link',
        'render_callback' => 'education_center_get_courses_btn_lbl',
    ) );

}
endif;
add_action( 'customize_register', 'education_center_customize_register_featured_courses' );