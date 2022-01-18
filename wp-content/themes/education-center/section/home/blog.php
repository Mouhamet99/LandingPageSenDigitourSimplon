<?php
/**
 * Blog Section
 * 
 * @package Education_Center
 */

$ed_blog        = get_theme_mod( 'ed_blog_post', false );
$sec_title      = get_theme_mod( 'blog_title' );
$subtitle       = get_theme_mod( 'blog_subtitle' );
$readmore_lbl   = get_theme_mod( 'readmore_lbl' );

$args = array(
    'post_type'         => 'post',
    'posts_per_page'    => 3,
    'post_status'       => 'publish'
);

$qry = new WP_Query( $args );
if( $ed_blog && ( $sec_title || $subtitle || $qry->have_posts() ) ) {?>
    <section class="blog" id="blog-section">
        <div class="container">
            <?php if( $sec_title || $subtitle ){ ?>
                <div class="section-header section-header--center">
                    <?php if( $subtitle ) echo '<span class="section-header__info">' . esc_html( $subtitle ) . '</span>';
                    if( $sec_title ) echo '<h2 class="section-header__title">' . esc_html( $sec_title ) . '</h2>'; ?>
                </div>
            <?php } 
            if( $qry->have_posts() ){ ?>
                <div class="row">
                    <?php while( $qry->have_posts() ){ 
                        $qry->the_post(); ?>
                        <article class="post" itemscope itemtype="https://schema.org/Blog">
                            <div class="blog__card">
                                <figure class="blog__img">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if( has_post_thumbnail() ){
                                            the_post_thumbnail( 'education-center-featured-posts', array( 'itemprop' => 'image' ) );
                                        }else{
                                            education_center_get_fallback_svg( 'education-center-featured-posts' );
                                        } ?>
                                    </a>
                                </figure>
                                <div class="blog__info">
                                    <div class="blog-category">
                                        <?php education_center_category(); ?>
                                    </div>
                                    <?php the_title( '<a href="' . esc_url( get_permalink() ) . '"><h4 class="blog__title">', '</h4></a>' ); ?>
                                    <div class="blog__bottom">
                                        <?php if( $readmore_lbl ) echo '<a href="' . get_permalink( get_the_ID() ) . '" class="btn-link">' . esc_html( $readmore_lbl ) . '</a>';
                                        education_center_posted_on(); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php } wp_reset_postdata(); ?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php }