<?php
/**
 * Education Center Pro Customizer Partials
 *
 * @package Education_Center
 *
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function education_center_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function education_center_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'education_center_banner_subtitle' ) ) :
    /**
     * Banner SubTitle
    */
    function education_center_banner_subtitle(){
        return get_theme_mod( 'banner_subtitle', __( 'Welcome to SCU', 'education-center' ) );
    }
endif;

if( ! function_exists( 'education_center_banner_title' ) ) :
    /**
     * Banner Title
    */
    function education_center_banner_title(){
        return get_theme_mod( 'banner_title', __( 'SCU is the One Stop for all Students.', 'education-center' ) );
    }
endif;
    
if( ! function_exists( 'education_center_banner_content' ) ) :
    /**
     * Banner Content
    */
    function education_center_banner_content(){
        return get_theme_mod( 'banner_content', __( 'Take your learning organisation to the next level.', 'education-center' ) );
    }
endif;
    
if( ! function_exists( 'education_center_banner_btn_label' ) ) :
    /**
     * Banner Button Label
    */
    function education_center_banner_btn_label(){
        return get_theme_mod( 'banner_btn_label', __( 'See Courses', 'education-center' ) );
    }
endif;

if( ! function_exists( 'education_center_banner_btn_two_label' ) ) :
    /**
     * Banner Button Label
    */
    function education_center_banner_btn_two_label(){
        return get_theme_mod( 'banner_btn_two_label', __( 'Start Trial', 'education-center' ) );
    }
endif;

if( ! function_exists( 'education_center_slider_btn_label' ) ) :
    /**
     * Slider Button Label
    */
    function education_center_slider_btn_label(){
        return get_theme_mod( 'slider_btn_label', __( 'See Courses', 'education-center' ) );
    }
endif;

if( ! function_exists( 'education_center_archive_btn_label' ) ) :
    /**
     * Archive Button Label
    */
    function education_center_archive_btn_label(){
        return get_theme_mod( 'archive_btn_label', __( 'View Details', 'education-center' ) );
    }
endif;

if( ! function_exists( 'education_center_get_footer_copyright' ) ) :
/**
 * Show/Hide Author link in footer
*/
function education_center_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copy-right">';
    if( $copyright ){
        echo wp_kses_post( $copyright );
    }else{
        esc_html_e( 'Copyright &copy; ', 'education-center' ) . date_i18n( esc_html__( 'Y', 'education-center' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
    }
    echo '</span>';
}
endif;

if( ! function_exists( 'education_center_ed_author_link' ) ) :
/**
 * Show/Hide Author link in footer
*/
function education_center_ed_author_link(){
    $ed_author_link = get_theme_mod( 'ed_author_link', false );
    if( ! $ed_author_link ) {
        echo '<span class="author-link">'; 
        esc_html_e( 'Developed By ', 'education-center' );
        echo '<a href="' . esc_url( 'https://glthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Good Looking Themes', 'education-center' ) . '</a>.';
        echo '</span>';
    } 
}
endif;

if( ! function_exists( 'education_center_ed_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function education_center_ed_wp_link(){
    $ed_wp_link = get_theme_mod( 'ed_wp_link', false );
    if( ! $ed_wp_link ) printf( esc_html__( '%1$s Powered by %2$s%3$s', 'education-center' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'education-center' ) ) .'" target="_blank">WordPress</a>.', '</span>' );
}
endif;

if( ! function_exists( 'education_center_get_phone' ) ) :
/**
 * Phone Callback
*/
function education_center_get_phone(){
    return get_theme_mod( 'phone' );
}
endif;

if( ! function_exists( 'education_center_get_email' ) ) :
/**
 * Email Callback
*/
function education_center_get_email(){
    return get_theme_mod( 'email' );
}
endif;

if( ! function_exists( 'education_center_get_header_btn_lbl' ) ) :
/**
 * Login Button Callback
*/
function education_center_get_header_btn_lbl(){
    return get_theme_mod( 'header_btn_lbl' );
}
endif;

if( ! function_exists( 'education_center_get_blog_title' ) ) :
/**
 * Blog Title Callback
*/
function education_center_get_blog_title(){
    return get_theme_mod( 'blog_title' );
}
endif;

if( ! function_exists( 'education_center_get_blog_subtitle' ) ) :
/**
 * Blog subtitle Callback
*/
function education_center_get_blog_subtitle(){
    return get_theme_mod( 'blog_subtitle' );
}
endif;

if( ! function_exists( 'education_center_get_readmore_lbl' ) ) :
/**
 * Blog Readmore label Callback
*/
function education_center_get_readmore_lbl(){
    return get_theme_mod( 'readmore_lbl' );
}
endif;

if( ! function_exists( 'education_center_get_about_title' ) ) :
/**
 * About section title callback
*/
function education_center_get_about_title(){
    return get_theme_mod( 'about_title' );
}
endif;

if( ! function_exists( 'education_center_get_about_subtitle' ) ) :
/**
 * About section subtitle callback
*/
function education_center_get_about_subtitle(){
    return get_theme_mod( 'about_subtitle' );
}
endif;

if( ! function_exists( 'education_center_get_about_content' ) ) :
/**
 * About section content callback
*/
function education_center_get_about_content(){
    return get_theme_mod( 'about_content' );
}
endif;

if( ! function_exists( 'education_center_get_viewmore_lbl' ) ) :
/**
 * About section View more callback
*/
function education_center_get_viewmore_lbl(){
    return get_theme_mod( 'viewmore_lbl' );
}
endif;

if( ! function_exists( 'education_center_get_features_title' ) ) :
/**
 * Course Features title callback
*/
function education_center_get_features_title(){
    return get_theme_mod( 'features_title' );
}
endif;

if( ! function_exists( 'education_center_get_features_subtitle' ) ) :
/**
 * Course Features subtitle callback
*/
function education_center_get_features_subtitle(){
    return get_theme_mod( 'features_subtitle' );
}
endif;

if( ! function_exists( 'education_center_get_cta_title' ) ) :
/**
 * CTA section title callback
*/
function education_center_get_cta_title(){
    return get_theme_mod( 'cta_title' );
}
endif;

if( ! function_exists( 'education_center_get_cta_subtitle' ) ) :
/**
 * CTA section description callback
*/
function education_center_get_cta_subtitle(){
    return get_theme_mod( 'cta_subtitle' );
}
endif;

if( ! function_exists( 'education_center_get_cta_contact_lbl' ) ) :
/**
 * cta section View more callback
*/
function education_center_get_cta_contact_lbl(){
    return get_theme_mod( 'cta_contact_lbl' );
}
endif;

if( ! function_exists( 'education_center_related_posts_title' ) ) :
/**
 * Single post related posts title
*/
function education_center_related_posts_title(){
    return get_theme_mod( 'related_post_title', __( 'You might also like', 'education-center' ) );
}
endif;

if( ! function_exists( 'education_center_get_video_block_title' ) ) :
/**
 * Video Block section title
*/
function education_center_get_video_block_title(){
    return get_theme_mod( 'video_block_title' );
}
endif;

if( ! function_exists( 'education_center_get_courses_btn_lbl' ) ) :
/**
 * Featured courses section button label
*/
function education_center_get_courses_btn_lbl(){
    return get_theme_mod( 'courses_btn_lbl' );
}
endif;

if( ! function_exists( 'education_center_get_courses_title' ) ) :
/**
 * Featured courses section title
*/
function education_center_get_courses_title(){
    return get_theme_mod( 'courses_title' );
}
endif;

if( ! function_exists( 'education_center_get_courses_subtitle' ) ) :
/**
 * Featured courses section subtitle
*/
function education_center_get_courses_subtitle(){
    return get_theme_mod( 'courses_subtitle' );
}
endif;

if( ! function_exists( 'education_center_contact_title' ) ) :
/**
 * Contact Page title
*/
function education_center_contact_title(){
    return get_theme_mod( 'contact_title' );
}
endif;

if( ! function_exists( 'education_center_contact_subtitle' ) ) :
/**
 * Contact Page subtitle
*/
function education_center_contact_subtitle(){
    return get_theme_mod( 'contact_subtitle' );
}
endif;

if( ! function_exists( 'education_center_contact_content' ) ) :
/**
 * Contact Page content
*/
function education_center_contact_content(){
    return get_theme_mod( 'contact_content' );
}
endif;

if( ! function_exists( 'education_center_contact_location_title' ) ) :
/**
 * Contact Page location title
*/
function education_center_contact_location_title(){
    return get_theme_mod( 'location_title' );
}
endif;

if( ! function_exists( 'education_center_contact_email_title' ) ) :
/**
 * Contact Page email title
*/
function education_center_contact_email_title(){
    return get_theme_mod( 'mail_title' );
}
endif;

if( ! function_exists( 'education_center_contact_phone_title' ) ) :
/**
 * Contact Page phone title
*/
function education_center_contact_phone_title(){
    return get_theme_mod( 'phone_title' );
}
endif;

if( ! function_exists( 'education_center_contact_contact_hours' ) ) :
/**
 * Contact Page contact timing title
*/
function education_center_contact_contact_hours(){
    return get_theme_mod( 'contact_hours' );
}
endif;

if( ! function_exists( 'education_center_contact_form_title' ) ) :
/**
 * Contact Page contact form title
*/
function education_center_contact_form_title(){
    return get_theme_mod( 'contact_form_title' );
}
endif;

if( ! function_exists( 'education_center_contact_form_subtitle' ) ) :
/**
 * Contact Page contact form subtitle
*/
function education_center_contact_form_subtitle(){
    return get_theme_mod( 'contact_form_subtitle', __( 'Your email address will not be published.', 'education-center' ) );
}
endif;