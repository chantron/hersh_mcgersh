<?php
/**
 * hersh_mcgersh functions and definitions
 *
 * @package hersh_mcgersh
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'hersh_mcgersh_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hersh_mcgersh_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hersh_mcgersh, use a find and replace
	 * to change 'hersh_mcgersh' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hersh_mcgersh', get_template_directory() . '/languages' );

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
		'primary' => __( 'Primary Menu', 'hersh_mcgersh' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hersh_mcgersh_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // hersh_mcgersh_setup
add_action( 'after_setup_theme', 'hersh_mcgersh_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function hersh_mcgersh_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'hersh_mcgersh' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'hersh_mcgersh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hersh_mcgersh_scripts() {
	wp_enqueue_style( 'hersh_mcgersh-style', get_stylesheet_uri() );

	wp_enqueue_style( 'hersh_mcgersh-lightbox', get_template_directory_uri() . '/css/lightbox.css' );

	wp_enqueue_script( 'hersh_mcgersh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'hersh_mcgersh-functions', get_template_directory_uri() . '/js/functions.js', array(), '20120206', true );

	wp_enqueue_script( 'hersh_mcgersh-masonry', get_template_directory_uri() . '/js/masonry.min.js', array(), '20120206', true );
	
	wp_enqueue_script( 'hersh_mcgersh-lightbox', get_template_directory_uri() . '/js/lightbox.min.js', array(), '20120206', true );

	wp_enqueue_script( 'hersh_mcgersh-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hersh_mcgersh_scripts' );

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
