<?php
/**
 * Video Section
 * 
 * @package Education_Center
 */

$ed_video    = get_theme_mod( 'ed_video_sec', false ); 
$sec_title   = get_theme_mod( 'video_block_title' ); 
$sec_content = get_theme_mod( 'video_block_content' ); 
$video_url   = get_theme_mod( 'video_link' ); 
$bg_image    = get_theme_mod( 'video_block_img' );
if( $bg_image ){
    $bg_style = 'style="background-image: url(' . esc_url( $bg_image ) . ') "';
}else{
    $bg_style = '';
}

if( $ed_video && ( $sec_title || $sec_content || $video_url ) ){ ?>
    <section class="video-block" id="video-block-section" <?php if ( $bg_image ) echo $bg_style; ?>>
        <div class="container">
            <div class="video-block__wrap">
                <?php if( $sec_title || $sec_content ){ ?>
                    <div class="video-block__text">
                        <?php if( $sec_title ) echo '<h2>' . esc_html( $sec_title ) . '</h2>';
                        if( $sec_content ) echo wp_kses_post( wpautop( $sec_content ) ); ?>
                    </div>
                <?php } 
                if( $video_url ){ ?>
                    <div class="video-block__icon">
                        <a href="<?php echo esc_url( $video_url ); ?>" class="video-control-btn" target="_blank">
                            <svg width="81" height="80" viewbox="0 0 81 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="40.4707" cy="40" r="38.5" stroke="#F7F7F7" stroke-width="3" />
                                <path d="M51.5677 41.4351L33.8952 51.6892C32.3954 52.5585 30.4707 51.5059 30.4707 49.7533V29.2451C30.4707 27.4953 32.3927 26.4399 33.8952 27.312L51.5677 37.5662C51.9089 37.7609 52.1925 38.0424 52.3898 38.3822C52.587 38.7219 52.6909 39.1078 52.6909 39.5006C52.6909 39.8934 52.587 40.2793 52.3898 40.619C52.1925 40.9588 51.9089 41.2403 51.5677 41.4351Z" fill="#F7F7F7" />
                            </svg>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }