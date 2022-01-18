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
        <?php education_center_blog_info(); ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->