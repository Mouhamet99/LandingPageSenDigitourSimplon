<?php
/**
 * Template part for displaying results in single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Education_Center
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-image">
        <?php 
            if( has_post_thumbnail() ){ ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php }
            education_center_entry_header(); 
        ?>
    </div>
    <div class="entry-title-wrapper">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </div>
    <div class="entry-content">
        <?php 
            the_content(); 
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education-center' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>
    <div class="social-wrap">
        <?php echo get_the_tag_list( '<div class="tag-list"><ul>', ' ', '</ul></div>' ); ?>
    </div>
    <?php education_center_author_box(); ?>
</article>