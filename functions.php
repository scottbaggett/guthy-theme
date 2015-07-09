<?php
/**
 * Milkit functions and definitions
 *
 * @package Milkit
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1346; /* pixels */
}

if ( ! function_exists( 'milkit_setup' ) ) :

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function milkit_setup() {

	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'milkit', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/* mega menu */
	add_image_size( 'milkit_248x158', 248, 158, true );
	/* post 2/3/4/5 cols with sidebar, post 3/4/5 cols no sidebar */
	add_image_size( 'milkit_440x293', 440, 293, true );
	/* post 2 cols no sidebar */
	add_image_size( 'milkit_650x433', 650, 433, true );
	/* wide thumb with sidebar */
	add_image_size( 'milkit_886x590', 886, 590, true );
	/* wide thumb no sidebar */
	add_image_size( 'milkit_1330x590', 1330, 590, true );
	/* widget thumbs */
	add_image_size( 'milkit_60x60', 60, 60, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'milkit' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'audio', 'video'
	) );

}
endif; // milkit_setup
add_action( 'after_setup_theme', 'milkit_setup' );

/**
 * Enqueue scripts and styles.
 */
function milkit_scripts() {
	wp_enqueue_style( 'milkit-style', get_stylesheet_uri() );
	if ( get_option( 'milkit_opt_check_responsive' )  == 'false' ) {
		wp_enqueue_style( 'milkit-fixed-style', get_template_directory_uri() . '/fixed.css' );
	}
	wp_enqueue_style( 'milkit-fontawesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );

	wp_enqueue_style( 'http://fonts.googleapis.com/css?family=Tangerine');

	wp_enqueue_script( 'milkit-common', get_template_directory_uri() . '/js/common.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'milkit-init', get_template_directory_uri() . '/js/init.js', array( 'jquery' ), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( ( get_option( 'show_on_front' ) === 'page' ) && is_front_page() && ( get_option( 'milkit_opt_show_slider' ) == 'true' ) ) {
		wp_enqueue_script( 'milkit-flexslider', get_template_directory_uri() . '/js/flexslider.js', array( 'jquery' ), false, true );
	}

	if ( is_single() ) {

		global $post;

		$has_gallery = get_post_meta( $post->ID, 'milkit_meta_custom_gallery_check', true );

		if ( $has_gallery == 'yes' ) {

			wp_enqueue_style( 'milkit-photoswipe-css', get_template_directory_uri() . '/lib/photoswipe/photoswipe.css' );
			wp_enqueue_style( 'milkit-photoswipe-skin', get_template_directory_uri() . '/lib/photoswipe/default-skin/default-skin.css' );
			wp_enqueue_script( 'milkit-photoswipe-js', get_template_directory_uri() . '/lib/photoswipe/photoswipe.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'milkit-photoswipe-ui', get_template_directory_uri() . '/lib/photoswipe/photoswipe-ui-default.min.js', array( 'jquery' ), false, true );
			wp_enqueue_script( 'milkit-photoswipe-init', get_template_directory_uri() . '/js/photoswipe.init.js', array( 'jquery' ), false, true );

		}

	}
}
add_action( 'wp_enqueue_scripts', 'milkit_scripts' );

/**
 * CUSTOM theme additions by Scott Baggett.
 */
require get_template_directory() . '/sb/sb-template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/core/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/core/extras.php';

/**
 * Custom functions for the sidebars.
 */
require get_template_directory() . '/core/sidebars.php';

/**
 * Custom functions for the widgets.
 */
require get_template_directory() . '/core/widgets.php';

/**
 * Custom functions for the mega-menu.
 */
require get_template_directory() . '/core/mega-menu.php';

/**
 * Theme options panel.
 */
require get_template_directory() . '/core/theme-panel/admin-functions.php';

/**
 * Custom styles.
 */
require get_template_directory() . '/core/custom-styles.php';

/**
 * Require Milkit Framework.
 */
require get_template_directory() . '/core/class-tgm-plugin-activation.php';
require get_template_directory() . '/core/activate-milkit-framework.php';
