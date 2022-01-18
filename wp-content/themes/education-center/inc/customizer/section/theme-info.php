<?php
/**
 * Education Center Theme Info
 *
 * @package Education_Center
 */
if( ! function_exists( 'education_center_theme_info' ) ) :

function education_center_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info', 
        array(
            'title'    => esc_html__( 'Information Links' , 'education-center' ),
            'priority' => 6,
		)
    );

	/** Important Links */
	$wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<ul>';
    $theme_info .= sprintf( __( '<li>View documentation: %1$sClick here.%2$s</li>', 'education-center' ),  '<a href="' . esc_url( 'https://glthemes.com/documentation/education-center/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Theme info: %1$sClick here.%2$s</li>', 'education-center' ),  '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/education-center/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>Support ticket: %1$sClick here.%2$s</li>', 'education-center' ),  '<a href="' . esc_url( 'https://glthemes.com/support/' ) . '" target="_blank">', '</a>' );
    $theme_info .= sprintf( __( '<li>More WordPress Themes: %1$sClick here.%2$s</li>', 'education-center' ),  '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/' ) . '" target="_blank">', '</a>' );
    $theme_info .= '</ul>';

	$wp_customize->add_control( new Education_Center_Note_Control( $wp_customize,
        'theme_info_theme',
            array(
                'label'       => esc_html__( 'Important Links' , 'education-center' ),
                'section'     => 'theme_info',
                'description' => $theme_info
    		)
        )
    );

}
endif;
add_action( 'customize_register', 'education_center_theme_info' );

if( class_exists( 'WP_Customize_Section' ) ) :
/**
 * Adding Go to Pro Section in Customizer
 * https://github.com/justintadlock/trt-customizer-pro
 */
class Education_Center_Customize_Section_Pro extends WP_Customize_Section {

    /**
     * The type of customize section being rendered.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $type = 'pro-section';

    /**
     * Custom button text to output.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_text = '';

    /**
     * Custom pro button URL.
     *
     * @since  1.0.0
     * @access public
     * @var    string
     */
    public $pro_url = '';

    /**
     * Add custom parameters to pass to the JS via JSON.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function json() {
        $json = parent::json();

        $json['pro_text'] = $this->pro_text;
        $json['pro_url']  = esc_url( $this->pro_url );

        return $json;
    }

    /**
     * Outputs the Underscore.js template.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    protected function render_template() { ?>
        <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
            <h3 class="accordion-section-title">
                {{ data.title }}
                <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                <# } #>
            </h3>
        </li>
    <?php }
}
endif;

if ( ! function_exists( 'education_center_sections_pro' ) ) :

function education_center_sections_pro( $manager ) {
    // Register custom section types.
    $manager->register_section_type( 'Education_Center_Customize_Section_Pro' );

    // Register sections.
    $manager->add_section(
        new Education_Center_Customize_Section_Pro(
            $manager,
            'education_center_view_pro',
            array(
                'title'    => esc_html__( 'Pro Available', 'education-center' ),
                'priority' => 5, 
                'pro_text' => esc_html__( 'VIEW PRO THEME', 'education-center' ),
                'pro_url'  => 'https://glthemes.com/wordpress-theme/education-center-pro/'
            )
        )
    );
}
endif;
add_action( 'customize_register', 'education_center_sections_pro' );