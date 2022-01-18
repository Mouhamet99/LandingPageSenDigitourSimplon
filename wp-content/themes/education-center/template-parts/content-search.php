<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Education_Center
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
    <div class="blog__card">
        <figure class="blog__img">
            <?php if( has_post_thumbnail() ){
                the_post_thumbnail( 'education-center-search', array( 'itemprop' => 'image' ) );
            }else{
                education_center_get_fallback_svg( 'education-center-search' );
            } ?>
        </figure>
        <div class="blog__info">
            <div class="blog-category">
                <?php education_center_category(); ?>
            </div>
            <?php the_title( '<a href="' . esc_url( get_permalink() ) . '"><h4 class="blog__title">', '</h4></a>' ); ?>
            <div class="blog__bottom">
                <a href="<?php the_permalink(); ?>" class="btn-link"><?php esc_html_e( 'Read More', 'education-center' ); ?></a>
                <?php education_center_posted_on(); ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->