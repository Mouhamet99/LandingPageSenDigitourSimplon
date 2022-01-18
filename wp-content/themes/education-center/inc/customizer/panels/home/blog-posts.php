<?php
/**
 * Blog Posts Settings
 *
 * @package Education_Center
 */
if ( ! function_exists( 'education_center_customize_register_home_blog_posts' ) ) :

function education_center_customize_register_home_blog_posts( $wp_customize ){

    /** Blog Post Settings  */
    $wp_customize->add_section(
        'blog_posts',
        array(
            'title'    => __( 'Blog Posts Section', 'education-center' ),
            'priority' => 50,
            'panel'    => 'frontpage_settings',
        )
    );

    /** Enable Blog Post Section */
    $wp_customize->add_setting( 
        'ed_blog_post', 
        array(
            'default'           => false,
            'sanitize_callback' => 'education_center_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Toggle_Control( 
			$wp_customize,
			'ed_blog_post',
			array(
				'section'     => 'blog_posts',
				'label'	      => __( 'Enable Blog Post Section', 'education-center' ),
                'description' => __( 'Enable to show blog post section in your homepage', 'education-center' ),
			)
		)
	);

    /** Title Text */
    $wp_customize->add_setting( 
        'blog_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'blog_title',
        array(
            'section'         => 'blog_posts',
            'label'           => __( 'Section Title', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'blog_title', array(
        'selector'        => '.site .blog .section-header h2.section-header__title',
        'render_callback' => 'education_center_get_blog_title',
    ) );

    /** Subtitle Text */
    $wp_customize->add_setting( 
        'blog_subtitle', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'blog_subtitle',
        array(
            'section'         => 'blog_posts',
            'label'           => __( 'Section Subtitle', 'education-center' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
        'selector'        => '.site .blog .section-header .section-header__info',
        'render_callback' => 'education_center_get_blog_subtitle',
    ) );

    /** Readmore Label */
    $wp_customize->add_setting(
        'readmore_lbl',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field', 
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'readmore_lbl',
        array(
            'type'            => 'text',
            'section'         => 'blog_posts',
            'label'           => __( 'Readmore Text', 'education-center' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'readmore_lbl', array(
        'selector'        => '.site .blog .blog__info .blog__bottom a.btn-link',
        'render_callback' => 'education_center_get_readmore_lbl',
    ) );

}

add_action( 'customize_register', 'education_center_customize_register_home_blog_posts' );
endif;