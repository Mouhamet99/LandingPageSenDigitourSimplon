<?php
/**
 * Template part for displaying results in single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Education_Center
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="content-wrap">
        <div class="entry-content">
            <?php 
                the_title( '<h1 class="entry-title">', '</h1>' );

                if( has_post_thumbnail() ){ ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
                    </div>
                <?php }

                the_content(); 
                
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'education-center' ),
                    'after'  => '</div>',
                ) ); 
            ?>
        </div>
    </div>
</article>