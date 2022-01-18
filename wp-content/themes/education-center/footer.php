<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Center
 */

?>
	<footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
        <?php education_center_footer_top(); ?>
        <div class="footer-bottom">
            <div class="container">
                <?php 
                    education_center_footer_site_info();
                ?> 
            </div>
        </div>
    </footer>
    <div class="overlay"></div>
    <?php 
    /**
     * @hooked education_center_footer_page_end - 10
     */
    do_action( 'education_center_after_footer' );

    wp_footer(); ?>
</div><!-- #page -->

</body>
</html>