<?php
/**
 * Education Center functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Education_Center
 */

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Extra Functions.
 */
require get_template_directory() . '/inc/extra-functions.php';

/**
 * Customizer
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( education_center_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woo-functions.php';    
}