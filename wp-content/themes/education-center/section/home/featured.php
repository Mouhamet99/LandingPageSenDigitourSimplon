<?php
/**
 * Featured Section
 * 
 * @package Education_Center
 */

$ed_feat_course = get_theme_mod( 'ed_feat_course', false );
$sec_title      = get_theme_mod( 'courses_title' );
$subtitle       = get_theme_mod( 'courses_subtitle' );
$btn_lbl        = get_theme_mod( 'courses_btn_lbl' );
if( $ed_feat_course && education_center_is_tutor_lms_activated() ){ ?>
    <section class="f-course" id="featured-course">
        <div class="container">
            <?php if( $sec_title || $subtitle ){ ?>
                <div class="section-header section-header--center">
                    <?php if( $subtitle ) echo '<span class="section-header__info">' . esc_html( $subtitle ) . '</span>';
                    if( $sec_title ) echo '<h2 class="section-header__title">' . esc_html( $sec_title ). '</h2>'; ?>
                </div>
            <?php } ?>
            <div class="f-grid">
                <div class="filters filter-button-group">
                    <?php $course_qry = new WP_Query( array( 'post_type' => 'courses', 'post_status' => 'publish', 'posts_per_page' => 3 ) );   
                    if( $course_qry->have_posts() ){ 
                        echo '<div class="grid">';
                        while( $course_qry->have_posts() ){
                            $course_qry->the_post();
                            $term_list   = get_the_term_list( get_the_ID(), 'course-category' ); 
                            $course_lvl  = get_post_meta( get_the_ID(), '_tutor_course_price_type', true ); ?>
                            <div class="f-wrap">
                                <div class="f-wrap__content">
                                    <div class="f-image">
                                        <?php if( has_post_thumbnail() ){
                                            the_post_thumbnail( 'education-center-featured-posts', array( 'itemprop' => 'image' ) );
                                        }else{
                                            education_center_get_fallback_svg( 'education-center-featured-posts' );
                                        } ?>
                                    </div>
                                    <div class="f-info">
                                        <span class="category-list">
                                            <?php echo $term_list; ?>
                                        </span>
                                        <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); ?>
                                        <span class="f-writer"><?php education_center_posted_by(); ?></span>
                                    </div>
                                    <div class="f-wrap__bottom">
                                        <span class="f-wrap__price"><?php echo ( $course_lvl == 'paid' ) ? esc_html__( 'Paid','education-center' ) : esc_html__( 'Free','education-center' ); ?></span>
                                        <?php if( $btn_lbl ) echo '<a href="' . get_permalink( get_the_ID() ) . '" class="btn-link">' . esc_html( $btn_lbl ) . '</a>'; ?>
                                    </div>
                                </div>
                            </div>
                            <?php 
                        }
                        echo '</div>';
                        wp_reset_postdata();
                    } 
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php }