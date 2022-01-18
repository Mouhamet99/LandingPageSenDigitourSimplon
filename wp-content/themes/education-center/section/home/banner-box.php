<?php
/**
 * Banner Box Section
 * 
 * @package Education_Center
 */

$ed_banner_box = get_theme_mod( 'ed_banner_box', false );
$icon_text     = get_theme_mod( 'banner_icon_text' );
$ed_banner     = get_theme_mod( 'ed_banner_section', 'static_banner' );

if( $ed_banner == 'no_banner' ){
    $banner_class = ' no-banner';
}else{
    $banner_class = '';
}

if( ! empty( $icon_text ) && $ed_banner_box ) { ?>                 
    <section class="banner-boxes<?php echo esc_attr( $banner_class ); ?>">
        <div class="container">
            <div class="row">
                <?php foreach( $icon_text as $icon ) { ?>
                    <div class="col">
                        <div class="icon-box">
                            <?php if( isset( $icon['icon'] ) ) { ?>
                                <div class="icon-wrap">
                                    <?php echo wp_get_attachment_image( $icon['icon'] ); ?>
                                </div>
                            <?php } if( isset( $icon['title'] ) || isset( $icon['description'] ) ) { ?>
                                <div class="icon-text">
                                    <?php 
                                        if ( isset( $icon['title'] ) ) echo '<h2>' . esc_html( $icon['title'] ) . '</h2>'; 
                                        if ( isset( $icon['description'] ) ) echo '<p>' . wp_kses_post( $icon['description'] ) . '</p>'; 
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }