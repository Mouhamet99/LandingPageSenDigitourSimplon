<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package education_center
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div class="container">
            <div class="page-grid">
                <div id="main" class="site-main">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'single' );

                    endwhile; // End of the loop.

                    /**
                     * @hooked education_center_navigation           - 10
                     * @hooked education_center_comment              - 20
                     * @hooked education_center_related_posts        - 30
                    */
                    do_action( 'education_center_after_post_content' );
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
        
<?php
get_footer();
