<?php
/**
 * CTA Section
 * 
 * @package Education_Center
 */

$ed_cta           = get_theme_mod( 'ed_cta', false );
$cta_title        = get_theme_mod( 'cta_title' );
$cta_subtitle     = get_theme_mod( 'cta_subtitle' );
$cta_btn          = get_theme_mod( 'cta_contact_lbl' );
$cta_btn_link     = get_theme_mod( 'cta_contact_link' );
$background_image = get_theme_mod( 'cta_background_image' );

if( $ed_cta && ( $cta_title || $cta_subtitle || $cta_btn ) ) { ?>
<section id="cta-section" class="cta" <?php if ( $background_image ) echo 'style="background-image: url(' . esc_url( $background_image ) . ') "'; ?> >
    <div class="container">
        <div class="cta-wrap">
            <?php if( $cta_title || $cta_subtitle ) { ?>
                <div class="cta__info">
                    <?php 
                        if ( $cta_title ) echo '<h2 class="cta__title">' . esc_html( $cta_title ) . '</h2>';
                        if ( $cta_subtitle ) echo '<span class="cta__text">' . esc_html( $cta_subtitle ) . '</span>';
                    ?>
                </div>
            <?php } if ( $cta_btn && $cta_btn_link ) { ?>
                <div class="cta__btn">
                    <a href="<?php echo esc_url( $cta_btn_link ); ?>" class="btn btn-lg" target="_blank" ><?php echo esc_html( $cta_btn ); ?><span class="btn-arrow btn-arrow--dark"></span></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php }