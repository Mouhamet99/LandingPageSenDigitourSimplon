<?php
/**
 * About Section
 * 
 * @package Education_Center
 */

$ed_about       = get_theme_mod( 'ed_about', false );
$sec_title      = get_theme_mod( 'about_title' );
$subtitle       = get_theme_mod( 'about_subtitle' );
$sec_content    = get_theme_mod( 'about_content' );
$abt_img        = get_theme_mod( 'about_featured_image' );
$viewmore_lbl   = get_theme_mod( 'viewmore_lbl' );
$viewmore_link  = get_theme_mod( 'viewmore_link' );
$image_alt      = attachment_url_to_postid( $abt_img );

if( $ed_about && ( $sec_title || $subtitle || $sec_content || $abt_img || ( $viewmore_lbl && $viewmore_link ) ) ){ ?>
    <section class="about right-align" id="about-section">
        <div class="container">
            <div class="about__wrap">
                <?php if( $sec_title || $subtitle || $sec_content || ( $viewmore_lbl && $viewmore_link ) ){ ?>
                    <div class="about__intro">
                        <?php if( $sec_title || $subtitle ){ ?>
                            <div class="section-header">
                                <?php if( $subtitle ) echo '<span class="section-header__info">' . esc_html( $subtitle ) . '</span>';
                                if( $sec_title ) echo '<h2 class="section-header__title">' . esc_html( $sec_title ) . '</h2>'; ?>
                            </div>
                        <?php } 
                        if( $sec_content ) echo wp_kses_post( wpautop( $sec_content ) );
                        if( $viewmore_lbl && $viewmore_link ) echo '<a href="' . esc_url( $viewmore_link ) . '" class="btn btn-lg btn-primary">' . esc_html( $viewmore_lbl ) . '<span class="btn-arrow"></span></a>'; ?>
                    </div>
                <?php } 
                if( $abt_img ) echo '<div class="about__img"><figure><img src="' . esc_url( $abt_img ) . '" alt="' . esc_attr( get_post_meta( $image_alt, '_wp_attachment_image_alt', true ) ) . '" height="592px" width="592px"></figure></div>'; ?>
            </div>
        </div>
    </section>
<?php }