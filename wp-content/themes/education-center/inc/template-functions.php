<?php
/**
 * Education Center Pro Template Functions which enhance the theme by hooking into WordPress
 *
 * @package Education_Center
 */

if( ! function_exists( 'education_center_doctype' ) ) : 
/**
 * Doctype Declaration
*/
function education_center_doctype(){ ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <?php
}
endif;
add_action( 'education_center_doctype', 'education_center_doctype' );

if( ! function_exists( 'education_center_head' ) ) :
/**
 * Before wp_head 
*/
function education_center_head(){ ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
}
endif;
add_action( 'education_center_before_wp_head', 'education_center_head' );

if( ! function_exists( 'education_center_page_start' ) ) :
/**
 * Page Start
*/
function education_center_page_start(){ ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'education-center' ); ?></a>
    <?php
}
endif;
add_action( 'education_center_before_header', 'education_center_page_start', 20 );

if( ! function_exists( 'education_center_header' ) ) :
/**
 * Header Start
*/
function education_center_header(){ 

    $phone          = get_theme_mod( 'phone' ); 
    $email          = get_theme_mod( 'email' ); 
    $ed_social      = get_theme_mod( 'ed_social_links', false ); ?>

    <header id="masthead" class="site-header style-one" itemscope itemtype="https://schema.org/WPHeader">
        <?php if( $phone || $email || $ed_social ){ ?>
            <div class="header-top clearfix">
                <div class="container">
                    <?php if( $phone || $email ){ ?>
                        <div class="info">
                            <?php 
                                if( $phone ) echo '<a href="' . esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ) . '" class="tel-link"><svg width="16" height="16" viewbox="0 0 16 16" fill="#F7F7F7" xmlns="http://www.w3.org/2000/svg"><path d="M15.6643 12.2499L12.2415 9.13784C12.0797 8.99078 11.8671 8.91235 11.6486 8.91911C11.4301 8.92587 11.2227 9.01728 11.0703 9.17404L9.05539 11.2462C8.5704 11.1536 7.59536 10.8496 6.59169 9.84849C5.58803 8.84398 5.28407 7.86641 5.19397 7.38479L7.26445 5.36904C7.42141 5.21674 7.51296 5.00935 7.51972 4.79076C7.52647 4.57216 7.44791 4.35951 7.30066 4.19781L4.18946 0.775917C4.04215 0.613711 3.8374 0.515321 3.61871 0.501643C3.40002 0.487965 3.18462 0.560077 3.01824 0.702663L1.1911 2.26963C1.04552 2.41573 0.958635 2.61018 0.946915 2.81609C0.934285 3.02659 0.693472 8.01292 4.55994 11.8811C7.933 15.2533 12.1582 15.5 13.3218 15.5C13.4919 15.5 13.5963 15.4949 13.6241 15.4933C13.83 15.4817 14.0243 15.3945 14.1697 15.2482L15.7358 13.4203C15.879 13.2544 15.9516 13.0392 15.9383 12.8205C15.9249 12.6018 15.8266 12.397 15.6643 12.2499Z" /></svg>' . esc_html( $phone ) . '</a>';
                                if( $email ) echo '<a href="' . esc_url( 'mailto:' . sanitize_email( $email ) ) . '" class="email-link"><svg width="19" height="14" viewbox="0 0 19 14" fill="#F7F7F7" xmlns="http://www.w3.org/2000/svg"><path d="M17.9448 4.79271C18.0768 4.68776 18.2732 4.78594 18.2732 4.95182V11.875C18.2732 12.7721 17.5453 13.5 16.6482 13.5H2.56482C1.66768 13.5 0.939819 12.7721 0.939819 11.875V4.95521C0.939819 4.78594 1.13279 4.69115 1.2682 4.79609C2.02654 5.38516 3.03201 6.13333 6.48513 8.64193C7.19946 9.16328 8.40466 10.2602 9.60649 10.2534C10.8151 10.2635 12.044 9.14297 12.7312 8.64193C16.1844 6.13333 17.1864 5.38177 17.9448 4.79271ZM9.60649 9.16667C10.3919 9.18021 11.5226 8.17813 12.0914 7.7651C16.5838 4.50495 16.9258 4.22057 17.9617 3.40807C18.158 3.25573 18.2732 3.01875 18.2732 2.76823V2.125C18.2732 1.22786 17.5453 0.5 16.6482 0.5H2.56482C1.66768 0.5 0.939819 1.22786 0.939819 2.125V2.76823C0.939819 3.01875 1.05492 3.25234 1.25128 3.40807C2.28722 4.21719 2.62914 4.50495 7.12159 7.7651C7.69034 8.17813 8.82107 9.18021 9.60649 9.16667Z" /></svg>' . esc_html( $email ) . '</a>';
                            ?>
                        </div>
                    <?php } ?>
                    <section class="social-wrap">
                        <?php if( $ed_social ) education_center_social_links( true ); ?>
                    </section>
                </div>
            </div>
        <?php } ?>
        <div class="desktop-header">
            <div class="header-bottom">
                <div class="container">
                    <div class="header-wrapper">
                        <?php education_center_site_branding(); ?>
                        <div class="nav-wrap">
                            <div class="header-left">
                                <?php education_center_primary_navigation(); ?>
                            </div>
                            <div class="header-right">
                                <?php education_center_header_search();
                                education_center_header_button(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            /**
             *  Mobile Navigation
             */
            education_center_mobile_navigation();
        ?>
    </header>
<?php }
endif;
add_action( 'education_center_header_before_content', 'education_center_header', 10 );

function education_center_content_start(){ ?>
    <div id="content" class="site-content">
<?php }
add_action( 'education_center_header_before_content', 'education_center_content_start', 40 );

function education_center_footer_page_end(){ ?>
    </div>
<?php }
add_action ( 'education_center_after_footer', 'education_center_footer_page_end', 10 );

if( ! function_exists( 'education_center_top_wrapper' ) ) :
/**
 * Breadcrumbs
 */
function education_center_top_wrapper(){
    if( ( is_archive() || is_search() || is_404() || is_singular() || is_home() ) && ! is_front_page() ){ ?>
        <div class="breadcrumb-wrapper">
            <div class="container">
                <?php if( is_search() ){ ?>
                    <header class="entry-header">
                        <h1 class="page-title"> 
                            <?php printf( esc_html( 'Search Results For %s', 'education_center' ), get_search_query() ); ?>
                        </h1>
                    </header>
                <?php 
                } elseif( is_archive() ){
                    if( is_author() || is_category() ){
                        the_archive_title( '<h1 class="page-title">', '</h1>' );
                    }
                }elseif( is_singular() ){
                    the_title('<span class="page-title">', '</span>');
                }elseif( is_404() ){ ?>
                    <header class="entry-header">
                        <span class="page-title"><?php esc_html_e( 'Error page', 'education-center' ); ?></span>
                    </header>
                <?php }elseif( is_home() && ! is_front_page() ){ ?>
                    <header class="entry-header">
                        <span class="page-title"><?php single_post_title(); ?></span>
                    </header>
                <?php }
                education_center_breadcrumb(); ?>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'education_center_header_before_content', 'education_center_top_wrapper', 30 );

if( ! function_exists( 'education_center_banner' ) ) :
/**
 * Banner Section
 */
function education_center_banner(){
$banner               = get_theme_mod( 'ed_banner_section', 'static_banner' );
$banner_subtitle      = get_theme_mod( 'banner_subtitle', __( 'Welcome to SCU', 'education-center' ) );
$banner_title         = get_theme_mod( 'banner_title', __( 'SCU is the One Stop for all Students.', 'education-center' ) );
$banner_desc          = get_theme_mod( 'banner_content',  __( 'Take your learning organisation to the next level.', 'education-center' ) );
$btn_one              = get_theme_mod( 'banner_btn_label', __( 'See Courses', 'education-center' ) );
$btn_one_url          = get_theme_mod( 'banner_link', '#' );
$btn_two              = get_theme_mod( 'banner_btn_two_label', __( 'Start Trial', 'education-center' ) );
$btn_two_url          = get_theme_mod( 'banner_link_two', '#' );

if( is_front_page() && $banner == 'static_banner' && has_custom_header() ){ ?>
    <section class="cta-banner left-align banner<?php if( has_header_video() ) echo esc_attr( ' video-banner' ); ?>" id="banner_section">
        <div class="banner-image-wrapper">
            <?php the_custom_header_markup(); ?>
        </div>
        <?php if( $banner_title || $banner_desc || $btn_one || $banner_subtitle) { ?>
            <div class="banner__wrap">
                <div class="container">
                    <div class="banner__text>">
                        <?php if( $banner_subtitle ){ ?>
                            <span class="banner__stitle">
                                <?php echo esc_html( $banner_subtitle ); ?>
                            </span>
                        <?php } if( $banner_title ){ ?>
                            <h2 class="banner__title">
                                <?php echo esc_html( $banner_title ); ?>
                            </h2>                         
                        <?php } if( $banner_desc ){ ?>
                            <div class="banner-desc">
                                <?php echo wp_kses_post( wpautop( $banner_desc ) ); ?>
                            </div>
                        <?php } if( $btn_one || $btn_two ) { ?>
                            <div class="btn-wrap">
                                <?php if( $btn_one && $btn_one_url ) { ?>
                                    <a href="<?php echo esc_url( $btn_one_url ); ?>" class="btn btn-primary btn-lg">
                                        <?php echo esc_html( $btn_one ); ?>
                                        <span class="btn-arrow"></span>
                                    </a>
                                <?php } if( $btn_two && $btn_two_url ) { ?>
                                    <a href="<?php echo esc_url( $btn_two_url ); ?>" class="btn btn-lg btn-tertiary">
                                        <?php echo esc_html( $btn_two ); ?>
                                        <span class="btn-arrow"></span>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
<?php }
}
endif;
add_action( 'education_center_header_before_content', 'education_center_banner', 20 );

if( ! function_exists( 'education_center_navigation' ) ) :
    /**
     * navigation
     */
    function education_center_navigation(){
        if( is_singular() ){ 
            $next_post	= get_next_post();
            $prev_post  = get_previous_post();
            
            if( $next_post || $prev_post ){ ?>
                <nav class="post-navigation pagination">
                    <div class="nav-links">
                        <?php if( $prev_post ){ ?>
                            <div class="nav-previous">
                                <a href="<?php the_permalink( $prev_post->ID ); ?>" rel="prev">
                                    <article class="post">
                                        <figure class="post-thumbnail">
                                            <?php $prev_img = get_post_thumbnail_id( $prev_post->ID ); 
                                            if( $prev_img ){
                                                echo wp_get_attachment_image( $prev_img, 'thumbnail', false, array( 'itemprop' => 'image' ) );
                                            }else{
                                                education_center_get_fallback_svg( 'thumbnail' );
                                            }?>
                                        </figure>
                                        <div class="pagination-details">
                                            <header class="entry-header">
                                                <h3 class="entry-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></h3>  
                                            </header>
                                            <span class="meta-nav"><?php echo esc_html__( 'Prev', 'education-center' ); ?></span>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        <?php }
                        if( $next_post ){ ?>
                            <div class="nav-next">
                                <a href="<?php the_permalink( $next_post->ID ); ?>" rel="next">
                                    <article class="post">
                                        <figure class="post-thumbnail">
                                            <?php $next_img = get_post_thumbnail_id( $next_post->ID ); 
                                            if( $next_img ){
                                                echo wp_get_attachment_image( $next_img, 'thumbnail', false, array( 'itemprop' => 'image' ) );
                                            }else{
                                                education_center_get_fallback_svg( 'thumbnail' );
                                            }?>									
                                        </figure>
                                        <div class="pagination-details">
                                            <header class="entry-header">
                                                <h3 class="entry-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></h3>
                                            </header>
                                            <span class="meta-nav"><?php echo esc_html__( 'Next', 'education-center' ); ?></span>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        <?php } ?>
                    </div>	
                </nav>
            <?php }
        }else{ ?>
            <div class="default">			
                <?php the_posts_navigation(); ?>
            </div>
		    <?php
        }
    }
endif;
add_action( 'education_center_after_post_content', 'education_center_navigation', 10 );
add_action( 'education_center_after_posts_content', 'education_center_navigation' );

if( ! function_exists( 'education_center_comment' ) ) :
/**
 * Comments Template 
*/
function education_center_comment(){
    // If comments are open or we have at least one comment, load up the comment template.
    if( ( comments_open() || get_comments_number() ) ) :
        comments_template();
    endif;
}
endif;
add_action( 'education_center_after_post_content', 'education_center_comment', 20 );
add_action( 'education_center_after_page_content', 'education_center_comment' );

if( ! function_exists( 'education_center_related_posts' ) ) :
/**
 * Related Posts 
*/
function education_center_related_posts(){ 
    education_center_get_posts_list( 'related' );    
}
endif;                                                                               
add_action( 'education_center_after_post_content', 'education_center_related_posts', 30 );

if( ! function_exists( 'education_center_latest_posts' ) ) :
/**
 * Latest Posts
*/
function education_center_latest_posts(){ 
    education_center_get_posts_list( 'latest' );
}
endif;
add_action( 'education_center_latest_posts', 'education_center_latest_posts' );

if( ! function_exists( 'education_center_location' ) ) :
/**
 * Contact Location
 */
function education_center_location(){ 
    $loc_title  = get_theme_mod( 'location_title' );
    $details    = get_theme_mod( 'location' ); 
    
    if( $loc_title || $details ){ ?>
        <li>
            <div class="icon">
                <?php echo wp_kses( education_center_social_icons_svg_list( 'location' ), get_kses_extended_ruleset() ); ?>
            </div>
            <div class="contact-details">
                <?php 
                    if( $loc_title ) echo '<span class="contact-title location">' . esc_html( $loc_title ) . '</span>';
                    if( $details ) echo wp_kses_post( wpautop( $details ) );
                ?>
            </div>
        </li>
    <?php }
}
endif;
add_action( 'education_center_contact_page_details', 'education_center_location', 10 );

if( ! function_exists( 'education_center_mail' ) ) :
/**
 * Contact Mail
 */
function education_center_mail(){ 
    $mail_title = get_theme_mod( 'mail_title' );
    $details    = get_theme_mod( 'mail_description' ); 
    $emails     = explode( ',', $details);

    if( $mail_title || $details ){ ?>
        <li>
            <div class="icon">
                <?php echo wp_kses( education_center_social_icons_svg_list( 'email' ), get_kses_extended_ruleset() ); ?>
            </div>
            <div class="contact-details">
                <?php 
                    if( $mail_title ) echo '<span class="contact-title email">' . esc_html( $mail_title ) . '</span>';
                    if( $details ) {
                        foreach( $emails as $email ){ ?>
                            <a href="<?php echo esc_url( 'mailto:' . sanitize_email( $email ) ); ?>" class="email-link">
                                <?php echo esc_html( $email ); ?>
                            </a>
                        <?php }
                    }
                ?>
            </div>
        </li>
    <?php }
}
endif;
add_action( 'education_center_contact_page_details', 'education_center_mail', 20 );

if( ! function_exists( 'education_center_phone' ) ) :
/**
 * Contact Phone
 */
function education_center_phone(){ 
    $phone_title = get_theme_mod( 'phone_title' );
    $details     = get_theme_mod( 'phone_number' ); 
    $numbers     = explode( ',', $details);

    if( $phone_title || $details ){ ?>
        <li>
            <div class="icon">
                <?php echo wp_kses( education_center_social_icons_svg_list( 'phone' ), get_kses_extended_ruleset() ); ?>
            </div>
            <div class="contact-details">
                <?php 
                    if( $phone_title ) echo '<span class="contact-title phone">' . esc_html( $phone_title ) . '</span>';
                    if( $details ) {
                        foreach( $numbers as $phone ){ ?>
                            <a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="tel-link">
								<?php echo esc_html( $phone ); ?>
							</a>
                        <?php }
                    }
                ?>
            </div>
        </li>
    <?php }
}
endif;
add_action( 'education_center_contact_page_details', 'education_center_phone', 30 );

if( ! function_exists( 'education_center_timing' ) ) :
/**
 * Contact Hours
 */
function education_center_timing(){ 
    $hours_title  = get_theme_mod( 'contact_hours' );
    $details      = get_theme_mod( 'contact_hrs_content' ); 
    $hours        = explode( ',', $details);

    if( $hours_title || $details ){ ?>
        <li>
            <div class="icon">
                <?php echo wp_kses( education_center_social_icons_svg_list( 'clock' ), get_kses_extended_ruleset() ); ?>
            </div>
            <div class="contact-details">
                <?php 
                    if( $hours_title ) echo '<span class="contact-title timing">' . esc_html( $hours_title ) . '</span>';
                    if( $details ) {
                        foreach( $hours as $hour ){ ?> 
                            <?php echo '<span class="contact-hours">' . esc_html( $hour ) . '</span>'; ?>
                        <?php }
                    }
                ?>
            </div>
        </li>
    <?php }
}
endif;
add_action( 'education_center_contact_page_details', 'education_center_timing', 40 );