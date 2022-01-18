<?php
/**
 * General Layout Settings
 * 
 * @package Education_Center
 */

function education_center_customize_register_layout_general( $wp_customize ) {
    
    /** Sidebar Layout Settings */
    $wp_customize->add_section(
        'general_layout_settings',
        array(
            'title'    => __( 'Layout Settings', 'education-center' ),
            'priority' => 55,
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'education_center_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Page Sidebar Layout', 'education-center' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in respective page.', 'education-center' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/assets/img/sidebar/general-full.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/assets/img/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/assets/img/sidebar/general-right.jpg',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'education_center_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Post Sidebar Layout', 'education-center' ),
				'description' => __( 'This is the general sidebar layout for posts & custom post. You can override the sidebar layout for individual post in respective post.', 'education-center' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/assets/img/sidebar/general-full.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/assets/img/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '//assets/img/sidebar/general-right.jpg',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'layout_style', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'education_center_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Education_Center_Radio_Image_Control(
			$wp_customize,
			'layout_style',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Default Sidebar Layout', 'education-center' ),
				'description' => __( 'This is the general sidebar layout for whole site.', 'education-center' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/assets/img/sidebar/general-full.jpg',
                    'left-sidebar'  => get_template_directory_uri() . '/assets/img/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/assets/img/sidebar/general-right.jpg',
				)
			)
		)
	);
    
}
add_action( 'customize_register', 'education_center_customize_register_layout_general' );