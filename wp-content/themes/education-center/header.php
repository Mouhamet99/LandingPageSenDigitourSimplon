<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Center
 */
    /**
     * Doctype Hook
     * 
     * @hooked education_center_doctype
    */
    do_action( 'education_center_doctype' );
?>
<head itemscope itemtype="https://schema.org/WebSite">
    <?php 
    /**
     * Before wp_head
     * 
     * @hooked education_center_head
    */
    do_action( 'education_center_before_wp_head' );
    
    wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">

<?php
    wp_body_open();
    /**
     * Before Header
     * 
     * @hooked education_center_page_start - 20 
    */
    do_action( 'education_center_before_header' );
    
    /**
     * Header
     * @hooked education_center_header                  - 10 
     * @hooked education_center_banner                  - 20 
     * @hooked education_center_top_wrapper             - 30 
     * @hooked education_center_content_start           - 40
    */
    do_action( 'education_center_header_before_content' );