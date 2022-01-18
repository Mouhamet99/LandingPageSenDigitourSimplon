<?php
/**
 * Course Section
 * 
 * @package Education_Center
 */

$ed_course_feat     = get_theme_mod( 'ed_course_feature', false ); 
$featured_image     = get_theme_mod( 'course_featured_image' );
$featured_title     = get_theme_mod( 'features_title' ); 
$featured_subtitle  = get_theme_mod( 'features_subtitle' );
$course_repeater    = get_theme_mod( 'course_feature_repeater' );
$image_alt          = attachment_url_to_postid( $featured_image );

if( $ed_course_feat && ( $featured_image || $featured_title || $featured_subtitle || $course_repeater ) ) { ?>
    <section class="course-highlights" id="feature-course-section">
        <div class="container">
            <div class="course-highlights__wrap">
                <div class="course-highlights__img">
                    <img src="<?php echo esc_url( $featured_image ); ?>" alt="<?php echo esc_attr( get_post_meta( $image_alt, '_wp_attachment_image_alt', true ) ); ?>" height="869px" width="710px">
                </div>
                <?php if( $featured_title || $featured_subtitle || $course_repeater ){ ?>
                    <div class="course-highlights__info">
                        <?php if( $featured_title || $featured_subtitle ){ ?>
                            <div class="section-header">
                                <?php if( $featured_subtitle ) echo '<span class="section-header__info">' . esc_html( $featured_subtitle ) . '</span>';
                                if( $featured_title ) echo '<h2 class="section-header__title">' . esc_html( $featured_title ) . '</h2>'; ?>
                            </div>
                        <?php } 
                        if( $course_repeater ){ ?>
                            <ul>
                                <?php foreach( $course_repeater as $course ){ 
                                    $image         = ( isset( $course['image'] ) && $course['image'] ) ? $course['image'] : '';
                                    $coursetitle   = ( isset( $course['title'] ) && $course['title'] ) ? $course['title'] : '';
                                    $coursecontent = ( isset( $course['content'] ) && $course['content'] ) ? $course['content'] : '';
                                    if( $image || $coursetitle || $coursecontent ){ ?>
                                        <li class="box-flex">
                                            <?php 
                                            if( $image ) echo '<div class="box-flex__icon">' . wp_get_attachment_image( $image ) . '</div>';
                                            if( $coursetitle || $coursecontent ){ ?>
                                                <div class="box-flex__text">
                                                    <?php if( $coursetitle ) echo '<h3>' . esc_html( $coursetitle ) . '</h3>';
                                                    if( $coursecontent ) echo wp_kses_post( wpautop( $coursecontent ) ); ?>
                                                </div>
                                            <?php } ?>
                                        </li>
                                    <?php } 
                                } ?>
                            </ul>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }
