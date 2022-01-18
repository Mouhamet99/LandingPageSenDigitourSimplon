<?php 
/**
 * Template Name: Contact page
 * 
 * @package Education_Center
 */

$contact_title   = get_theme_mod( 'contact_title' ); 
$subtitle        = get_theme_mod( 'contact_subtitle' ); 
$contact_content = get_theme_mod( 'contact_content' ); 
$ed_map          = get_theme_mod( 'ed_googlemap', true );
$google_map      = get_theme_mod( 'contact_google_map_iframe' );

get_header(); ?>

    <div class="contact-wrapper">
        <div class="container">
            <div class="contact-main-wrap row">
                <div class="contact-info-wrap col">
                    <?php if( $contact_title || $subtitle || $contact_content ){ ?>
                        <div class="section-header">
                            <?php 
                                if( $subtitle ) echo '<span class="section-header__info">' . esc_html( $subtitle ) . '</span>';
                                if( $contact_title ) echo '<h2 class="section-header__title">' . esc_html( $contact_title ) . '</h2>';
                                if( $contact_content ) echo wp_kses_post( wpautop( $contact_content ) ); 
                            ?>
                        </div>
                    <?php } ?>
                    <ul class="contact-info">
                        <?php
                        /**
                         * 
                         * @hooked education_center_location        - 10
                         * @hooked education_center_mail            - 20
                         * @hooked education_center_phone           - 30
                         * @hooked education_center_timing          - 40
                         */
                        do_action( 'education_center_contact_page_details' );
                        ?>
                    </ul>
                </div>
                <!-- Contact wrapper -->
                <?php education_center_contact_form(); ?>
            </div>
        </div>
    </div>
    <?php if( $ed_map && $google_map ){ ?> 
        <div class="map">
            <div class="container">
                <?php echo htmlspecialchars_decode( $google_map ); ?>
            </div>
        </div>
    <?php }

get_footer(); 