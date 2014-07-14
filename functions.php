<?php
/**
 * Swift functions and definitions
 *
 * @package Swift
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'swift_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function swift_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Swift, use a find and replace
	 * to change 'swift' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'swift', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'swift' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'swift_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // swift_setup
add_action( 'after_setup_theme', 'swift_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function swift_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'swift' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'swift_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function swift_scripts() {
	wp_enqueue_style( 'swift-style', get_stylesheet_uri() );
        wp_enqueue_style('bootstrap',get_template_directory_uri().'/bootstrap.min.css');
	// wp_enqueue_script( 'swift-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
        $fonts_url ='http://fonts.googleapis.com/css?family=Open+Sans|PT+Sans|Lora:700italic|Lato' ;
        if ( !empty ($fonts_url)){
            wp_enqueue_style('fonts',esc_url_raw($fonts_url),array(),null);
        }
        wp_enqueue_script('jquery');
        
        wp_enqueue_style('glyphicons',get_template_directory_uri() . '/bootstrap-glyphicons.css');
       wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js'); 
        wp_enqueue_script('bootstrap-wp', get_template_directory_uri() . '/js/bootstrap-wp.js'); 
	wp_enqueue_script( 'swift-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'swift_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
