<?php
/**
 * Extra functions to enhance the theme functionality
 */

if( ! function_exists( 'education_center_footer_top' ) ) :
    /**
     * Footer Top
    */
    function education_center_footer_top(){    
        $footer_sidebars = array( 'footer-one', 'footer-two', 'footer-three', 'footer-four' );
        $active_sidebars = array();
        $sidebar_count   = 0;
        
        foreach ( $footer_sidebars as $sidebar ) {
            if( is_active_sidebar( $sidebar ) ){
                array_push( $active_sidebars, $sidebar );
                $sidebar_count++;
            }
        } 
        
        if( $active_sidebars ){ ?>
            <div class="footer-top">
                <div class="container">
                    <div class="grid column-<?php echo esc_attr( $sidebar_count ); ?>">
                    <?php foreach( $active_sidebars as $active ){ ?>
                        <div class="col">
                           <?php dynamic_sidebar( $active ); ?> 
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        <?php 
        }   
    }
endif;

if( ! function_exists( 'education_center_footer_site_info' ) ) :
    /**
     * Footer site info
    */
    function education_center_footer_site_info(){ 
        echo '<div class="site-info">';
            education_center_get_footer_copyright();
            education_center_ed_author_link();
            education_center_ed_wp_link();
        echo '</div>';
}
endif;

if ( ! function_exists( 'education_center_site_branding' ) ) :
/**
 * Site Branding
 */
function education_center_site_branding(){
    ?>
    <div class="site-branding" itemscope itemtype="https://schema.org/Organization">
        <?php if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){            
            the_custom_logo();               
        } 
        
        if ( is_front_page() ) :
            ?>
            <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
        else :
            ?>
            <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php
        endif;
        $education_zone_description = get_bloginfo( 'description', 'display' );
        if ( $education_zone_description || is_customize_preview() ) :
            ?>
            <p class="site-description" itemprop="description"><?php echo $education_zone_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
        <?php endif; ?>
    </div><!-- .site-branding -->
    <?php
}
endif;

if ( ! function_exists( 'education_center_primary_navigation' ) ) :
/**
* Site Navigation
*/
function education_center_primary_navigation( $schema = true ){
    
    $schema_class = '';
    $mobile_id  = 'mobile-navigation';

    if( $schema ){
        $schema_class = ' itemscope itemtype="https://schema.org/SiteNavigationElement"';
        $mobile_id  = 'site-navigation';
    }

    if ( current_user_can( 'manage_options' ) || has_nav_menu( 'primary-menu' ) ) { ?>
        <nav id="<?php echo esc_attr( $mobile_id ); ?>" class="main-navigation" <?php echo $schema_class; ?>>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'primary-menu',
                        'menu_id'         => 'primary-menu',
                        'container_class' => 'primary-menu-container',
                        'fallback_cb'     => 'education_center_primary_menu_fallback',
                    )
                );
            ?>
        </nav>
    <?php }
}
endif;


if ( ! function_exists( 'education_center_primary_menu_fallback' ) ) :
/**
* Fallback for primary menu
*/
function education_center_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<div class="menu-primary-container">';
        echo '<ul id="primary-menu" class="nav-menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'education-center' ) . '</a></li>';
        echo '</ul>';
        echo '</div>';
    }
}
endif;

if( ! function_exists( 'education_center_mobile_navigation' ) ) :
/**
 * Mobile Navigation
 */
function education_center_mobile_navigation(){ ?>
    <div class="mobile-header">
        <div class="header-bottom">
            <div class="container">
                <div class="mob-nav-site-branding-wrap header-wrapper">
                    <div class="nav-wrap">
                        <?php education_center_site_branding(); ?>
                    </div>
                    <button id="menu-opener" class="toggle-btn toggle-main" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                        <span class="toggle-bar"></span> 
                        <span class="toggle-bar"></span>
                        <span class="toggle-bar"></span>
                        <span class="toggle-bar"></span>  
                    </button>
                </div>
                <div class="mobile-header-wrap menu-container-wrapper">
                    <div class="mobile-menu-wrapper">
                        <nav id="mobile-site-navigation" class="main-navigation mobile-navigation">        
                            <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">                  
                                <button class="toggle-btn toggle-off close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal">
                                    <span class="toggle-bar"></span> 
                                    <span class="toggle-bar"></span>
                                    <span class="toggle-bar"></span>
                                    <span class="toggle-bar"></span> 
                                </button>
                                <div class="header-left mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'education-center' ); ?>">
                                    <?php education_center_primary_navigation( false ); ?>
                                    <?php education_center_header_button(); ?>
                                </div>
                            </div>
                        </nav><!-- #mobile-site-navigation -->
                    </div>
                </div>  
            </div>
        </div>
    </div>

<?php }
endif;

if ( ! function_exists( 'education_center_header_search' ) ) :
/**
* Header Search
*/
function education_center_header_search(){ 
    $ed_search = get_theme_mod( 'ed_header_search', false ); 
    if( $ed_search ){ ?>
        <div class="header-search">
            <button class="search">
                <svg width="22" height="21" viewbox="0 0 22 21" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.9399 20L16.4539 15.506L20.9399 20ZM18.9399 9.5C18.9399 11.7543 18.0444 13.9163 16.4503 15.5104C14.8563 17.1045 12.6943 18 10.4399 18C8.1856 18 6.02359 17.1045 4.42953 15.5104C2.83547 13.9163 1.93994 11.7543 1.93994 9.5C1.93994 7.24566 2.83547 5.08365 4.42953 3.48959C6.02359 1.89553 8.1856 1 10.4399 1C12.6943 1 14.8563 1.89553 16.4503 3.48959C18.0444 5.08365 18.9399 7.24566 18.9399 9.5V9.5Z"
                        stroke="black" stroke-width="2" stroke-linecap="round" />
                </svg>
            </button>
            <div class="header-search-wrap">
                <div class="header-search-inner">
                    <?php get_search_form(); ?>
                </div>
                <button class="close"></button>
            </div>
        </div>
<?php }
}
endif;

if ( ! function_exists( 'education_center_header_button' ) ) :
/**
* Header Login
*/
function education_center_header_button(){ 
    $btn_lbl        = get_theme_mod( 'header_btn_lbl', __( 'Subscribe', 'education-center' ) ); 
    $btn_link       = get_theme_mod( 'header_btn_link' ); 
    
    if( $btn_lbl && $btn_link ) echo '<a href="' . esc_url( $btn_link ) . '" class="btn btn-sm btn-primary">' . esc_html( $btn_lbl ) . '</a>';

    }
endif;

if( ! function_exists( 'education_center_social_links' ) ) :
/**
 * Social Links 
*/
function education_center_social_links( $echo = true ){ 
    $social_links = get_theme_mod( 'social_links' );
        
    if( $social_links && $echo ){ ?>
    <ul class="social-networks">
        <?php 
        foreach( $social_links as $link ){
            $new_tab = isset( $link['checkbox'] ) && $link['checkbox'] ? '_blank' : '_self';
            if( isset( $link['link'] ) ){ ?>
            <li>
                <a href="<?php echo esc_url( $link['link'] ); ?>" target="<?php echo esc_attr( $new_tab ); ?>" rel="nofollow noopener">
                    <?php echo wp_kses( education_center_social_icons_svg_list( $link['icon'] ), get_kses_extended_ruleset() ); ?>
                </a>
            </li>    	   
            <?php
            } 
        } 
        ?>
    </ul>
    <?php    
    }elseif( $social_links ){
        return true;
    }else{
        return false;
    }                               
}
endif;

if( ! function_exists( 'education_center_is_woocommerce_activated' ) ) :
/**
 * Query WooCommerce activation
 */
function education_center_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}
endif;

if( ! function_exists( 'education_center_is_tutor_lms_activated' ) ) :
    /**
     * Tutor LMS Activation
     */
    function education_center_is_tutor_lms_activated() {
        return function_exists( 'tutor_lms' ) ? true : false;
    }
endif;

if( ! function_exists( 'education_center_get_posts' ) ) :
/**
 * Fuction to list Posts
*/
function education_center_get_posts( $post_type = 'post', $slug = false ){    
    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => $post_type,
        'post_status'      => 'publish',
        'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    
    // Initate an empty array
    $post_options = array();
    $post_options[''] = __( ' -- Choose -- ', 'education-center' );
    if ( ! empty( $posts_array ) ) {
        foreach ( $posts_array as $posts ) {
            if( $slug ){
                $post_options[ $posts->post_title ] = $posts->post_title;
            }else{
                $post_options[ $posts->ID ] = $posts->post_title;    
            }
        }
    }
    return $post_options;
    wp_reset_postdata();
}
endif;

if( ! function_exists( 'education_center_sidebar' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function education_center_sidebar( $class = false ){
    global $post;
    $return       = $return = $class ? 'full-width' : false; //Fullwidth
    $layout       = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout Style for Styling Settings
    $page_layout  = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Pages
    $post_layout  = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Global Layout/Position for Posts 
    
    if ( is_404() ) return;
    
    if( is_singular() ){  
        if( get_post_meta( $post->ID, '_education_center_sidebar_layout', true ) ){
            $sidebar_layout = get_post_meta( $post->ID, '_education_center_sidebar_layout', true );
        }else{
            $sidebar_layout = 'default-sidebar';
        }    
        if( is_page() ){     
            if( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' ){
                    $return = 'full-width';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = 'rightsidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = 'leftsidebar';
                }elseif( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ){
                    $return = 'full-width';
                }
            }else{
                $return = 'full-width';
            }
        }elseif( is_single() ){
            if( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' ){
                    $return = 'full-width';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = 'rightsidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = 'leftsidebar';
                }elseif( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ){
                    $return = 'full-width';
                }
            }else{
                $return = 'full-width';
            }
        }
    }elseif( is_archive() || is_search() ){
        //archive page                  
        if( is_active_sidebar( 'sidebar' ) ){
            if( $layout == 'no-sidebar' ){
                $return = 'full-width';
            }elseif( $layout == 'right-sidebar' ){
                $return = 'rightsidebar';
            }elseif( $layout == 'left-sidebar' ) {
                $return = 'leftsidebar';
            }
        }else{
            $return = 'full-width';
        }                       
    }else{
        if( is_active_sidebar( 'sidebar' ) ){            
            $return = 'rightsidebar';             
        }else{
            $return = 'full-width';
        } 
    }
        
    return $return; 
}
endif;

if( ! function_exists( 'education_center_breadcrumb' ) ) :
/**
 * Breadcrumbs
*/
function education_center_breadcrumb(){ 
    global $post;
    $post_page  = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
    $show_front = get_option( 'show_on_front' ); //What to show on the front page    
    $home       = get_theme_mod( 'home_text', __( 'Home', 'education-center' ) ); // text for the 'Home' link
    $delimiter  = '<span class="separator"><svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M1 1L4 4L1 7" stroke="#868686
    " stroke-linecap="round" stroke-linejoin="round"/></svg></span>';
    $before     = '<span class="current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">'; // tag before the current crumb
    $after      = '</span>'; // tag after the current crumb
    
    if( get_theme_mod( 'ed_breadcrumb', true ) ){
        $depth = 1;
        echo '<div id="crumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a href="' . esc_url( home_url() ) . '" itemprop="item"><span itemprop="name">' . esc_html( $home ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
        
        if( is_home() ){ 
            $depth = 2;                       
            echo $before . '<a itemprop="item" href="'. esc_url( get_the_permalink() ) .'"><span itemprop="name">' . esc_html( single_post_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;            
        }elseif( is_category() ){  
            $depth = 2;          
            $thisCat = get_category( get_query_var( 'cat' ), false );            
            if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                $p = get_post( $post_page );
                echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;  
            }            
            if( $thisCat->parent != 0 ){
                $parent_categories = get_category_parents( $thisCat->parent, false, ',' );
                $parent_categories = explode( ',', $parent_categories );
                foreach( $parent_categories as $parent_term ){
                    $parent_obj = get_term_by( 'name', $parent_term, 'category' );
                    if( is_object( $parent_obj ) ){
                        $term_url  = get_term_link( $parent_obj->term_id );
                        $term_name = $parent_obj->name;
                        echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $thisCat->term_id) ) . '"><span itemprop="name">' .  esc_html( single_cat_title( '', false ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;       
        }elseif( education_center_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
            $depth = 2;
            $current_term = $GLOBALS['wp_query']->get_queried_object();            
            if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }
                echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            if( is_product_category() ){
                $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                $ancestors = array_reverse( $ancestors );
                foreach ( $ancestors as $ancestor ) {
                    $ancestor = get_term( $ancestor, 'product_cat' );    
                    if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                        echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                        $depth++;
                    }
                }
            }
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $current_term->term_id ) ) . '"><span itemprop="name">' . esc_html( $current_term->name ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
        }elseif( education_center_is_woocommerce_activated() && is_shop() ){ //Shop Archive page
            $depth = 2;
            if( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ){
                return;
            }
            $_name    = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
            $shop_url = ( wc_get_page_id( 'shop' ) && wc_get_page_id( 'shop' ) > 0 )  ? get_the_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop' );
            if( ! $_name ){
                $product_post_type = get_post_type_object( 'product' );
                $_name             = $product_post_type->labels->singular_name;
            }
            echo $before . '<a itemprop="item" href="' . esc_url( $shop_url ) . '"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_tag() ){ 
            $depth          = 2;
            $queried_object = get_queried_object();
            echo $before . '<a itemprop="item" href="' . esc_url( get_term_link( $queried_object->term_id ) ) . '"><span itemprop="name">' . esc_html( single_tag_title( '', false ) ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />'. $after;
        }elseif( is_author() ){  
            global $author;
            $depth    = 2;
            $userdata = get_userdata( $author );
            echo $before . '<a itemprop="item" href="' . esc_url( get_author_posts_url( $author ) ) . '"><span itemprop="name">' . esc_html( $userdata->display_name ) .'</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;     
        }elseif( is_search() ){ 
            $depth       = 2;
            $request_uri = $_SERVER['REQUEST_URI'];
            echo $before . '<a itemprop="item" href="'. esc_url( $request_uri ) . '"><span itemprop="name">' . sprintf( __( 'Search Results for "%s"', 'education-center' ), esc_html( get_search_query() ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_day() ){            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'education-center' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'education-center' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'education-center' ) ), get_the_time( __( 'm', 'education-center' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'education-center' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_day_link( get_the_time( __( 'Y', 'education-center' ) ), get_the_time( __( 'm', 'education-center' ) ), get_the_time( __( 'd', 'education-center' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'd', 'education-center' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_month() ){            
            $depth = 2;
            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'education-center' ) ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_time( __( 'Y', 'education-center' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
            $depth++;
            echo $before . '<a itemprop="item" href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'education-center' ) ), get_the_time( __( 'm', 'education-center' ) ) ) ) . '"><span itemprop="name">' . esc_html( get_the_time( __( 'F', 'education-center' ) ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;        
        }elseif( is_year() ){ 
            $depth = 2;
            echo $before .'<a itemprop="item" href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'education-center' ) ) ) ) . '"><span itemprop="name">'. esc_html( get_the_time( __( 'Y', 'education-center' ) ) ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />'. $after;  
        }elseif( is_single() && !is_attachment() ){   
            $depth = 2;         
            if( education_center_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
                if( wc_get_page_id( 'shop' ) ){ //Displaying Shop link in woocommerce archive page
                    $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
                    if ( ! $_name ) {
                        $product_post_type = get_post_type_object( 'product' );
                        $_name = $product_post_type->labels->singular_name;
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $_name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;                    
                }           
                if( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ){
                    $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                    $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );    
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $ancestor ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $ancestor->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                    echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_term_link( $main_term ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $main_term->name ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                    $depth++;
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) .'</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $after;
            }elseif( get_post_type() != 'post' ){                
                $post_type = get_post_type_object( get_post_type() );                
                if( $post_type->has_archive == true ){// For CPT Archive Link                   
                    // Add support for a non-standard label of 'archive_title' (special use case).
                    $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                    echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( get_post_type() ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';
                    $depth++;    
                }
                echo $before . '<a href="' . esc_url( get_the_permalink() ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
            }else{ //For Post                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $post_page ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $p->post_title ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '</span>';  
                    $depth++; 
                }
                
                if( $cat_object ){ //Getting category hierarchy if any        
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object ){
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term         = $key;
                            $potential_parent = $object->term_id;
                        }
                    }                    
                    $cat  = $cat_object[$use_term];              
                    $cats = get_category_parents( $cat, false, ',' );
                    $cats = explode( ',', $cats );
                    foreach ( $cats as $cat ) {
                        $cat_obj = get_term_by( 'name', $cat, 'category' );
                        if( is_object( $cat_obj ) ){
                            $term_url  = get_term_link( $cat_obj->term_id );
                            $term_name = $cat_obj->name;
                            echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( $term_url ) . '"><span itemprop="name">' . esc_html( $term_name ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $delimiter . '</span>';
                            $depth++;
                        }
                    }
                }
                echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;   
            }        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){ //For Custom Post Archive
            $depth     = 2;
            $post_type = get_post_type_object( get_post_type() );
            if( get_query_var('paged') ){
                echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $delimiter . '/</span>';
                echo $before . sprintf( __('Page %s', 'education-center'), get_query_var('paged') ) . $after; //@todo need to check this
            }else{
                echo $before . '<a itemprop="item" href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '"><span itemprop="name">' . esc_html( $post_type->label ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
            }    
        }elseif( is_attachment() ){ 
            $depth = 2;           
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && !$post->post_parent ){            
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( get_the_permalink() ) . '"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" />' . $after;
        }elseif( is_page() && $post->post_parent ){            
            $depth       = 2;
            $parent_id   = $post->post_parent;
            $breadcrumbs = array();
            while( $parent_id ){
                $current_page  = get_post( $parent_id );
                $breadcrumbs[] = $current_page->ID;
                $parent_id     = $current_page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo '<span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="' . esc_url( get_permalink( $breadcrumbs[$i] ) ) . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title( $breadcrumbs[$i] ) ) . '</span></a><meta itemprop="position" content="'. absint( $depth ).'" />' . $delimiter . '</span>';
                $depth++;
            }
            echo $before . '<a href="' . get_permalink() . '" itemprop="item"><span itemprop="name">' . esc_html( get_the_title() ) . '</span></a><meta itemprop="position" content="' . absint( $depth ) . '" /></span>' . $after;
        }elseif( is_404() ){
            $depth = 2;
            echo $before . '<a itemprop="item" href="' . esc_url( home_url() ) . '"><span itemprop="name">' . esc_html__( '404 Error - Page Not Found', 'education-center' ) . '</span></a><meta itemprop="position" content="' . absint( $depth ). '" />' . $after;
        }
        
        if( get_query_var('paged') ) printf( __( ' (Page %s)', 'education-center' ), get_query_var('paged') );
        
        echo '</div><!-- .crumbs -->';
        
    }                
}
endif;

if ( ! function_exists( 'education_center_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function education_center_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = education_center_get_image_sizes( $post_thumbnail );
        
    if( $image_size ){ ?>
        <div class="svg-holder">
            <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f2f2f2;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if( ! function_exists( 'education_center_author_box' ) ) :
    /**
     * Author Box for Single Post and Archive Page
     */
    function education_center_author_box(){ 
        if( is_single() ){
            $ed_post_author = get_theme_mod( 'ed_post_author' );
        }else{
            $ed_post_author = false;
        }
        if( ! $ed_post_author ) { ?>
            <div class="author-section">
                <div class="author-wrapper">
                    <figure class="author-img">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 135 ); ?>
                    </figure>
                    <div class="author-wrap">
                        <h3 class="author-name">
                            <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
                        </h3>
                        <div class="author-content">
                            <p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } 
    }
endif;

if( ! function_exists( 'education_center_entry_header' ) ) :
/**
 * Single post entry header
*/
function education_center_entry_header(){ 
    $ed_post_date   = get_theme_mod( 'ed_post_date', false ); ?>
    <header class="entry-header">
        <div class="category-wrap">
            <?php education_center_category(); ?>
        </div>
        <div class="entry-meta">
            <span class="author-details">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 28 ); ?>
                <span class="byline">
                    <?php education_center_posted_by(); ?>
                </span>
            </span>
            <?php if( ! $ed_post_date ) education_center_posted_on(); ?>
            <span class="article-comments">
                <?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'education-center' ), number_format_i18n( get_comments_number() ) ); ?>
            </span>
        </div>
    </header>
<?php }
endif;

if( ! function_exists( 'education_center_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function education_center_theme_comment( $comment, $args, $depth ){
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo esc_html( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
    
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID(); ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
    <?php endif; ?>
        <article class="comment-body">
            <div class="comment-meta">
                <div class="comment-author vcard">
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'education-center' ); ?></em>
                        <br />
                    <?php endif;
                    if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                    <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b>', 'education-center' ), get_comment_author_link() ); ?>
                </div><!-- .comment-author vcard -->
                <div class="comment-metadata">
                    <?php esc_html_e( 'Posted on', 'education-center' );?>
                    <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                        <time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'education-center' ), get_comment_date(),  get_comment_time() ); ?></time>
                    </a>
                </div>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
        </article>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div><!-- .comment-body -->
    <?php endif;
}
endif;

if( ! function_exists( 'education_center_get_posts_list' ) ) :
/**
 * Returns Latest, Related & Popular Posts
*/
function education_center_get_posts_list( $status ){
    global $post;
    
    $args = array(
        'post_type'           => 'post',
        'posts_status'        => 'publish',
        'ignore_sticky_posts' => true
    );
    
    switch( $status ){
        case 'latest':        
        $args['posts_per_page'] = 3;
        $args_title             = __( 'Latest Posts', 'education-center' );
        $class                  = 'recent-posts';
        $image_size             = 'education-center-search';
        break;
        
        case 'related':
        $args['posts_per_page'] = 2;
        $args['post__not_in']   = array( $post->ID );
        $args['orderby']        = 'rand';
        $args_title             = get_theme_mod( 'related_post_title', __( 'Related Posts', 'education-center' ) );
        $class                  = 'related-post';
        $image_size             = 'education-center-search';
        break;        
    }
    
    $qry = new WP_Query( $args );
    
    if( $qry->have_posts() ){ ?>    
        <div class="<?php echo esc_attr( $class ); ?>">
            <?php 
            if( $args_title ) echo '<div class="section-header"><h2 class="section-header__title">' . esc_html( $args_title ) . '</h2></div>'; ?>
            <div class="grid-layout-wrap">
                <div class="row">
                    <?php while( $qry->have_posts() ){ $qry->the_post(); ?>
                        <article class="post">
                            <div class="blog__card">
                                <figure class="blog__img">
                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                        <?php
                                            if( has_post_thumbnail() ){
                                                the_post_thumbnail( $image_size, array( 'itemprop' => 'image' ) );
                                            }else{ 
                                                education_center_get_fallback_svg( $image_size );//fallback
                                            }
                                        ?>
                                    </a>
                                </figure>
                                <?php education_center_blog_info(); ?>
                            </div>
                        </article>
                    <?php } ?>  
                </div>
            </div> 
        </div>
        <?php
        wp_reset_postdata();
    }
}
endif;


if( ! function_exists( 'education_center_blog_info' ) ) :
/**
 * Blog info
*/
function education_center_blog_info(){ 
    $archive_btn_label = get_theme_mod( 'archive_btn_label', __( 'View Details', 'education-center' ) );
    $blog_btn_label    = get_theme_mod( 'readmore_lbl', __( 'Readmore', 'education-center' ) );
    $btn_label         = is_home() ? $blog_btn_label : $archive_btn_label; ?>
    
    <div class="blog__info">     
        <div class="blog-category">
            <?php education_center_category(); ?>
        </div>
        <?php the_title( '<a href="' . esc_url( get_permalink() ) . '"><h4 class="blog__title">', '</h4></a>' ); ?>
        <div class="blog__bottom">
            <?php if ( $btn_label ) { ?>
                <a href="<?php the_permalink(); ?>" class="btn-link btn-link--dark">
                    <?php echo esc_html( $btn_label ); ?>
                </a>
            <?php } 
            education_center_posted_on(); ?>
        </div>
    </div>
<?php }
endif;


if( ! function_exists( 'education_center_contact_form' ) ) :
/**
 * Contact form
 */
function education_center_contact_form(){ 
    $form_title = get_theme_mod( 'contact_form_title' );
    $subtitle   = get_theme_mod( 'contact_form_subtitle' ); 
    $shortcode  = get_theme_mod( 'contact_form_shortcode' ); 
    if( $form_title || $subtitle || $shortcode ){ ?>
        <div class="contact-form col">
            <div class="form-wrap">
                <?php if( $form_title || $subtitle ){ ?>
                    <header class="section-header">
                        <?php 
                            if( $form_title ) echo '<h2 class="section-title">' . esc_html( $form_title ) . '</h2>';
                            if( $subtitle ) echo '<p class="mb-0">' . esc_html( $subtitle ) . '</p>';
                        ?>
                    </header>
                <?php }
                if( $shortcode ) echo do_shortcode( $shortcode );?>
            </div>
        </div>
    <?php }
} 
endif;

if ( ! function_exists( 'education_center_google_fonts_url' ) ) :	
/**
 * Google Fonts url
 */
function education_center_google_fonts_url() {
	$fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by respective fonts, translate this to 'off'. Do not translate
    * into your own language.
    */
    $montserrat_font = _x( 'on', 'Montserrat font: on or off', 'education-center' );

    if ( 'off' !== $montserrat_font ) {
        $font_families[] = 'Montserrat:300,300i,400,400i,500,500i,600,600i';

        $query_args = array(
            'family'  => urlencode( implode( '|', $font_families ) ),
            'subset'  => urlencode( 'latin,latin-ext' ),
            'display' => urlencode( 'fallback' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

	return esc_url( $fonts_url );
}
endif;