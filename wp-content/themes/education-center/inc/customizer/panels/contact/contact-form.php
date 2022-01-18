<?php
/**
 * Contact Form Settings
 * 
 * @package Education_Center
 */

function education_center_contact_page_form( $wp_customize ){
    
	$wp_customize->add_section( 'contact_page_form', 
	    array(
	        'title'         => esc_html__( 'Contact Form Section', 'education-center' ),
	        'priority'      => 20,
            'panel'         => 'contact_page_settings',
	    ) 
	);

	$wp_customize->add_setting(
		'contact_form_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'contact_form_title',
		array(
			'section'           => 'contact_page_form',
			'label'             => __( 'Contact Form Title', 'education-center' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'contact_form_title', array(
        'selector'        => '.page-template-contact .contact-wrapper .contact-form .section-header h2.section-title',
        'render_callback' => 'education_center_contact_form_title',
    ) );

	$wp_customize->add_setting(
		'contact_form_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'contact_form_subtitle',
		array(
			'section'           => 'contact_page_form',
			'label'             => __( 'Contact Form Title', 'education-center' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'contact_form_subtitle', array(
        'selector'        => '.page-template-contact .contact-wrapper .contact-form .form-wrap .section-header p.mb-0',
        'render_callback' => 'education_center_contact_form_subtitle',
    ) );

	$wp_customize->add_setting(
		'contact_form_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'contact_form_shortcode',
		array(
			'section'           => 'contact_page_form',
			'label'             => __( 'Contact Form Shortcode', 'education-center' ),
            'description'       => __( 'Please generate the shortcode from contact form 7 widget', 'education-center' ),
			'type'              => 'text',
		)
	);
}

add_action( 'customize_register', 'education_center_contact_page_form' );