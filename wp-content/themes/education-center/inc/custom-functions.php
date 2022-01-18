<?php 
/**
 * education Center functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Education_Center
*/

$education_center_theme_data = wp_get_theme();
if( ! defined( 'EDUCATION_CENTER_THEME_VERSION' ) ) define( 'EDUCATION_CENTER_THEME_VERSION', $education_center_theme_data->get( 'Version' ) );
if( ! defined( 'EDUCATION_CENTER_THEME_NAME' ) ) define( 'EDUCATION_CENTER_THEME_NAME', $education_center_theme_data->get( 'Name' ) );

if ( ! function_exists( 'education_center_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function education_center_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on education Center, use a find and replace
		 * to change 'education-center' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'education-center', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' 	 => esc_html__( 'Primary', 'education-center' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'education_center_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 55,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		add_image_size( 'education-center-featured-posts', 440, 304, true );
		add_image_size( 'education-center-search', 439, 303, true );
		add_image_size( 'education-center-slider', 1920, 853, true );

	}
endif;
add_action( 'after_setup_theme', 'education_center_setup' );

if( ! function_exists( 'education_center_content_width' ) ) :
	function education_center_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'education_center_content_width', 930 );
	}
endif;
add_action( 'after_setup_theme', 'education_center_content_width', 0 );

if( ! function_exists( 'education_center_template_redirect_content_width' ) ) :
function education_center_template_redirect_content_width(){
	$sidebar = education_center_sidebar();
	if( $sidebar ){	   
		$GLOBALS['content_width'] = 930;     
	}else{
		if( is_singular() ){
			if( education_center_sidebar( true ) === 'full-width centered' ){
				$GLOBALS['content_width'] = 930; 
			}else{
				$GLOBALS['content_width'] = 1420;                
			}                
		}else{
			$GLOBALS['content_width'] = 1420;
		}
	}
}
endif;
add_action( 'template_redirect', 'education_center_template_redirect_content_width' );

if( ! function_exists( 'education_center_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function education_center_scripts() {

		// Use minified libraries if SCRIPT_DEBUG is false
		$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_style( 'education-center-google-fonts', education_center_google_fonts_url(), array(), null );
		wp_enqueue_style( 'education-center-style', get_stylesheet_uri(), array(), EDUCATION_CENTER_THEME_VERSION );
		wp_style_add_data( 'education-center-style', 'rtl', 'replace' );
		
		wp_enqueue_script( 'education-center-accessibility', get_template_directory_uri() . '/assets/js' . $build . '/modal-accessibility' . $suffix . '.js', array(), EDUCATION_CENTER_THEME_VERSION, true );
		wp_enqueue_script( 'education-center-navigation', get_template_directory_uri() . '/inc/js/navigation.js', array(), EDUCATION_CENTER_THEME_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		wp_enqueue_script( 'education-center-custom', get_template_directory_uri() . '/assets/js' . $build . '/custom' . $suffix . '.js',  array( 'jquery' ), EDUCATION_CENTER_THEME_VERSION, true );
			
		wp_localize_script( 
			'education-center-custom', 
			'ecp_data',
			array(
				'url'            => admin_url( 'admin-ajax.php' ),
				'plugin_url'     => plugins_url(),
				'rtl'            => is_rtl()
			)
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'education_center_scripts' );

if( ! function_exists( 'education_center_admin_scripts' ) ) :
	/**
	 * Enqueue admin scripts.
	 */
	function education_center_admin_scripts( $hook_suffix ) {

		wp_enqueue_style( 'education-center-admin-style',get_template_directory_uri().'/inc/css/admin.css', EDUCATION_CENTER_THEME_VERSION, 'screen' );
	}
add_action( 'admin_enqueue_scripts', 'education_center_admin_scripts' );
endif;

if( ! function_exists( 'education_center_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function education_center_body_classes( $classes ) {
		$transparent    = get_theme_mod( 'ed_transparent_header', false );
		$overlay   		= get_theme_mod( 'ed_banner_overlay', false );

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		if( get_background_image() ) {
			$classes[] = 'custom-background-image';
		}
		
		// Adds a class of custom-background-color to sites with a custom background color.
		if( get_background_color() != 'ffffff' ) {
			$classes[] = 'custom-background-color';
		}

		$classes[] = 'layout-1';

		
		// Transparent Header
		if ( $transparent && is_front_page() ) {
			$classes[] = 'header-transparent';
		}

		//Banner Overlay
		if ( $overlay && is_front_page() ) {
			$classes[] = 'banner-overlay';
		}
		
		$classes[] = education_center_sidebar();
		
		return $classes;
	}
endif;
add_filter( 'body_class', 'education_center_body_classes' );

if( ! function_exists( 'education_center_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function education_center_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
endif;
add_action( 'wp_head', 'education_center_pingback_header' );

if( ! function_exists( 'education_center_change_comment_form_default_fields' ) ) :
	/**
	 * Change Comment form default fields i.e. author, email & url.
	 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
	*/
	function education_center_change_comment_form_default_fields( $fields ){    
		// get the current commenter if available
		$commenter = wp_get_current_commenter();
	 
		// core functionality
		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$required = ( $req ? " required" : '' );
		$author   = ( $req ? __( 'Name*', 'education-center' ) : __( 'Name', 'education-center' ) );
		$email    = ( $req ? __( 'Email*', 'education-center' ) : __( 'Email', 'education-center' ) );
	 
		// Change just the author field
		$fields['author'] = '<div class=form-grid><p class="comment-form-author-name"><label class="screen-reader-text" for="author">' . esc_html__( 'Name', 'education-center' ) . '<span class="required">*</span></label><input id="author" name="author" placeholder="' . esc_attr( $author ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $required . ' /></p>';
		
		$fields['email'] = '<p class="comment-form-author-email"><label class="screen-reader-text" for="email">' . esc_html__( 'Email', 'education-center' ) . '<span class="required">*</span></label><input id="email" name="email" placeholder="' . esc_attr( $email ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . $required. ' /></p>';
		
		$fields['url'] = '<p class="comment-form-url"><label class="screen-reader-text" for="url">' . esc_html__( 'Website', 'education-center' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'education-center' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p></div>'; 
		
		$fields['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"><span class="checkmark"></span><label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'education-center' ) . '</label></p>'; 

		return $fields;    
	}
endif;
add_filter( 'comment_form_default_fields', 'education_center_change_comment_form_default_fields' );

if( ! function_exists( 'education_center_change_comment_form_defaults' ) ) :
	/**
	 * Change Comment Form defaults
	 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
	*/
	function education_center_change_comment_form_defaults( $defaults ){    
		$defaults['comment_field'] = '<p class="comment-form-content"><label class="screen-reader-text" for="comment">' . esc_html__( 'Comment', 'education-center' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment*', 'education-center' ) . '" cols="40" rows="8" aria-required="true" required></textarea></p>';
		
		return $defaults;    
	}
endif;
add_filter( 'comment_form_defaults', 'education_center_change_comment_form_defaults' );


if ( ! function_exists( 'education_center_widgets_init' ) ) :
/**
 * education center Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package education_center
 */

function education_center_widgets_init(){    
    $sidebars = array(
        'sidebar'   => array(
            'name'        => __( 'Sidebar', 'education-center' ),
            'id'          => 'sidebar', 
            'description' => __( 'Default Sidebar', 'education-center' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'education-center' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'education-center' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'education-center' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'education-center' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'education-center' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'education-center' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'education-center' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'education-center' ),
        )
    );
    
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h2 class="widget-title" itemprop="name">',
    		'after_title'   => '</h2>',
    	) );
    }
    
}
endif;
add_action( 'widgets_init', 'education_center_widgets_init' );