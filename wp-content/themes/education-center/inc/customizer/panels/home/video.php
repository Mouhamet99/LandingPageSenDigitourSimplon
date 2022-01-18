<?php
/**
 * Video Block Settings
 *
 * @package Education_Center
 */
if ( ! function_exists( 'education_center_customize_register_video_block' ) ) :

function education_center_customize_register_video_block( $wp_customize ){

    /** Video Block Section Settings  */
    $wp_customize->add_section(
        'video_block_section',
        array(
            'title'    => __( 'Video Block Section', 'education-center' ),
            'priority' => 45,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Enable Video Section */
    $wp_customize->add_setting( 
        'ed_video_sec', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Toggle_Control( 
			$wp_customize,
			'ed_video_sec',
			array(
				'section'     => 'video_block_section',
				'label'	      => __( 'Enable Video Block Section', 'education-center' ),
                'description' => __( 'Enable to show video block section in your homepage.', 'education-center' ),
			)
		)
	);

    /** Title Text */
    $wp_customize->add_setting( 
        'video_block_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'video_block_title',
        array(
            'section'         => 'video_block_section',
            'label'           => __( 'Section Title', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'video_block_title', array(
        'selector'        => '.home .video-block .video-block__text h2',
        'render_callback' => 'education_center_get_video_block_title',
    ) );

    /** Description Text */
    $wp_customize->add_setting( 
        'video_block_content', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'wp_kses_post',
        ) 
    );
    
    $wp_customize->add_control(
        'video_block_content',
        array(
            'section'         => 'video_block_section',
            'label'           => __( 'Section Content', 'education-center' ),
            'type'            => 'text',
        )   
    );

    // Video block link
    $wp_customize->add_setting(
        'video_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'video_link',
        array(
            'label'           => __( 'Video Link', 'education-center' ),
            'description'     => __( 'Enter a Video URL', 'education-center' ),
            'section'         => 'video_block_section',
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting( 
		'video_block_img', 
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
    	)
	);
 
    $wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'video_block_img', 
			array(
				'label'      => __( 'Upload a background image', 'education-center' ),
				'section'    => 'video_block_section',
			)
    	)
	);

}
endif;
add_action( 'customize_register', 'education_center_customize_register_video_block' );