<?php
/**
 * coco functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package coco
 */

if ( ! function_exists( 'coco_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function coco_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on coco, use a find and replace
	 * to change 'coco' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'coco', get_template_directory() . '/languages' );

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
	 * Enable support for custom logo.
	 *
	 *  https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 600,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1280, 720, true ); //16:9 image
	add_image_size( 'mobile-thumb', 320, 180, true );
	add_image_size( 'tablet-thumb', 640, 360, true );
	add_image_size( 'large-thumb', 1920, 1080, true ); //16:9


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'coco' ),
		'social' => esc_html__( 'Social', 'coco' ),
		'language' => esc_html__( 'Language', 'coco' ),
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'coco_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'coco_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coco_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'coco_content_width', 640 );
}
add_action( 'after_setup_theme', 'coco_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coco_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'coco' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'coco' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'coco_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coco_scripts() {
	wp_enqueue_style( 'coco-style', get_stylesheet_uri() );

		if( get_bloginfo('language') == 'en-US'){
			wp_enqueue_style( 'coco-fonts-EN', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,400i,700' );
		} elseif ( get_bloginfo('language') == 'ko-KR' ){
			wp_enqueue_style( 'coco-fonts-KR-nanum', 'https://fonts.googleapis.com/earlyaccess/nanumgothic.css' );
			wp_enqueue_style( 'coco-fonts-KR-jeju', 'https://fonts.googleapis.com/earlyaccess/jejugothic.css' );
		}

	wp_enqueue_style( 'coco-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	/**
	 * JQUERY LOAD AFTER CONTENT
	 */
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	wp_enqueue_script( 'jquery' );
	wp_deregister_script( 'jquery-migrate.min' );
	//wp_register_script( 'jquery-migrate.min', includes_url( '/js/jquery/jquery-migrate.min.js' ), false, NULL, true );
	//wp_enqueue_script( 'jquery-migrate.min' );

	wp_enqueue_script( 'coco-navigation', get_template_directory_uri() . '/dist/js/bundle.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coco_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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




/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 * https://developer.wordpress.org/reference/functions/the_excerpt/
 */
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 * https://developer.wordpress.org/reference/functions/the_excerpt/
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
