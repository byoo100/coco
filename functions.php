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
	add_image_size( 'square-sm', 300, 300, true );
	add_image_size( 'square-md', 500, 500, true );
	add_image_size( 'featured-xs', 320, 180, true );
	add_image_size( 'featured-sm', 640, 360, true );
	add_image_size( 'featured-lg', 1920, 1080, true ); //16:9


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
 * Load Theme Plugin Dependencies via TGM plugin
 */
require_once get_template_directory() . '/inc/TGM-Plugin/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'coco_register_required_plugins' );

function coco_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'COCO Custom Posttypes', // The plugin name.
			'slug'               => 'coco-posttypes', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/TGM-plugin/plugins/coco-posttypes.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		array(
			'name'               => 'Advanced Custom Fields Pro', // The plugin name.
			'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/TGM-plugin/plugins/advanced-custom-fields-pro.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),


		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'EWWW Image Optimizer', // The plugin name.
			'slug'         => 'ewww-image-optimizer', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/ewww-image-optimizer.3.3.1.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => '', // If set, overrides default API URL and points to an external URL.
		),

		array(
			'name'         => 'Polylang', // The plugin name.
			'slug'         => 'polylang', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/polylang.2.1.4.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => '', // If set, overrides default API URL and points to an external URL.
		),

		array(
			'name'         => 'Developer', // The plugin name.
			'slug'         => 'developer', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/developer.1.2.6.zip', // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => '', // If set, overrides default API URL and points to an external URL.
		),

		array(
			'name'         => 'Show Current Template', // The plugin name.
			'slug'         => 'show-current-template', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/show-current-template.0.3.0.zip', // The plugin source.
			'required'     => false, // If false, the plugin is only 'recommended' instead of required.
			'external_url' => '', // If set, overrides default API URL and points to an external URL.
		),
	);

	$config = array(
			'id'           => 'coco',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',

			'strings'      => array(
				'page_title'                      => __( 'Install Required Plugins', 'coco' ),
				'menu_title'                      => __( 'Install Plugins', 'coco' ),
				'installing'                      => __( 'Installing Plugin: %s', 'coco' ),
				'updating'                        => __( 'Updating Plugin: %s', 'coco' ),
				'oops'                            => __( 'Something went wrong with the plugin API.', 'coco' ),
				'notice_can_install_required'     => _n_noop(
					'This theme requires the following plugin: %1$s.',
					'This theme requires the following plugins: %1$s.',
					'coco'
				),
				'notice_can_install_recommended'  => _n_noop(
					'This theme recommends the following plugin: %1$s.',
					'This theme recommends the following plugins: %1$s.',
					'coco'
				),
				'notice_ask_to_update'            => _n_noop(
					'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
					'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
					'coco'
				),
				'notice_ask_to_update_maybe'      => _n_noop(
					'There is an update available for: %1$s.',
					'There are updates available for the following plugins: %1$s.',
					'coco'
				),
				'notice_can_activate_required'    => _n_noop(
					'The following required plugin is currently inactive: %1$s.',
					'The following required plugins are currently inactive: %1$s.',
					'coco'
				),
				'notice_can_activate_recommended' => _n_noop(
					'The following recommended plugin is currently inactive: %1$s.',
					'The following recommended plugins are currently inactive: %1$s.',
					'coco'
				),
				'install_link'                    => _n_noop(
					'Begin installing plugin',
					'Begin installing plugins',
					'coco'
				),
				'update_link' 					  => _n_noop(
					'Begin updating plugin',
					'Begin updating plugins',
					'coco'
				),
				'activate_link'                   => _n_noop(
					'Begin activating plugin',
					'Begin activating plugins',
					'coco'
				),
				'return'                          => __( 'Return to Required Plugins Installer', 'coco' ),
				'plugin_activated'                => __( 'Plugin activated successfully.', 'coco' ),
				'activated_successfully'          => __( 'The following plugin was activated successfully:', 'coco' ),
				'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'coco' ),
				'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'coco' ),
				'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'coco' ),
				'dismiss'                         => __( 'Dismiss this notice', 'coco' ),
				'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'coco' ),
				'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'coco' ),

				'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
			),
		);

		tgmpa( $plugins, $config );
}



/**
 * Enqueue scripts and styles.
 */
 if(!is_admin()){
	 function coco_scripts() {
	 	wp_enqueue_style( 'coco-style', get_stylesheet_uri() );

	 	wp_enqueue_style( 'coco-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,400i,700' );

	 	wp_enqueue_style( 'coco-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	 	/**
	 	 * JQUERY LOAD AFTER CONTENT
	 	 */
	 	wp_deregister_script( 'jquery' );
	 	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	 	wp_enqueue_script( 'jquery' );
	 	wp_deregister_script( 'jquery-migrate.min' );
	 	wp_register_script( 'jquery-migrate.min', includes_url( '/js/jquery/jquery-migrate.min.js' ), false, NULL, true );
	 	wp_enqueue_script( 'jquery-migrate.min' );

		wp_register_script( 'coco-bundle', get_template_directory_uri() . '/dist/js/bundle.min.js', array('jquery'), false, true );
	 	wp_enqueue_script( 'coco-bundle' );

		if( is_front_page() ){
			wp_register_script( 'coco-parallax', get_template_directory_uri() . '/dist/js/parallax.min.js', array('jquery'), false, true );
		 	wp_enqueue_script( 'coco-parallax' );
		}


		if( is_page( array( 'contact') ) ){
				// reCAPTCHA Validation
				wp_register_script( 'google-reCAPTCHA', 'https://www.google.com/recaptcha/api.js', array(), '', FALSE );
				wp_enqueue_script( 'google-reCAPTCHA' );

				wp_register_script( 'coco-contact', get_template_directory_uri() . '/dist/js/contact-form.js', array(), '', TRUE );
				wp_enqueue_script( 'coco-contact' );
		}


		if( is_page( array( 'volunteer', 'volunteer-kr' ) ) || is_singular('volunteers') ){

			// reCAPTCHA Validation
			wp_register_script( 'google-reCAPTCHA', 'https://www.google.com/recaptcha/api.js', array(), '', FALSE );
			wp_enqueue_script( 'google-reCAPTCHA' );

			wp_register_script( 'coco-volunteer', get_template_directory_uri() . '/dist/js/volunteer-form.js', array(), '', TRUE );
			wp_enqueue_script( 'coco-volunteer' );
		}


	 	/**
	 	 * AJAX PAGINATION
	 	 */
	 	global $wp_query;
	 	wp_localize_script( 'coco-bundle', 'ajaxpagination', array(
	 		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	 		'query_vars' => json_encode( $wp_query->query )
	 	));


	 	// GOOGLE MAP
		if( is_singular('events')){
			wp_enqueue_script( 'coco-google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAFEVbGugLqPUEPC3Y9pr2uHOe5YXVud3w', array( ), false, true );
		 	wp_enqueue_script( 'coco-google-map-js', get_template_directory_uri() . '/dist/js/google-map.js', array( 'jquery' ), false, true );
		}



	 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	 		wp_enqueue_script( 'comment-reply' );
	 	}
	 }
	 add_action( 'wp_enqueue_scripts', 'coco_scripts' );
 }//is_admin


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
 * AJAX PAGINATION
 */
add_action( 'wp_ajax_nopriv_ajax_pagination', 'my_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'my_ajax_pagination' );

function my_ajax_pagination() {
    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

    //$query_vars['paged'] = $_POST['page'];
		$query_vars = array(
			'post_status' => publish,
			'paged' => $_POST['page'],
		);

    query_posts( $query_vars );

    if( ! have_posts() ) {
        get_template_part( 'content', 'none' );
    }
    else {
        while ( have_posts() ) {
            the_post();

            get_template_part( 'template-parts/content', 'index' );
        }
    }

    coco_paging_nav();

    die();
}


/**
 * Removes default thumbnails
 * https://paulund.co.uk/remove-default-wordpress-image-sizes
 */
function remove_default_image_sizes( $sizes) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['medium_large']);
    unset( $sizes['large']);

		return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');



http://inspirationalpixels.com/snippets/add-post-type-to-main-loop
function add_post_types_to_loop($query) {
    if ($query->is_main_query() && $query->is_home() || $query->is_category() || $query->is_author()) {
        $query->set('post_type', array('post', 'events'));
    }
}
add_action('pre_get_posts', 'add_post_types_to_loop');


/**
 * Google Map api key registry
 *
 * https://www.advancedcustomfields.com/resources/google-map/
 */
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAFEVbGugLqPUEPC3Y9pr2uHOe5YXVud3w');
}
add_action('acf/init', 'my_acf_init');



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
 * Filter the excerpt length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 * https://developer.wordpress.org/reference/functions/the_excerpt/
 */
// function wpdocs_custom_excerpt_length( $length ) {
//     return 20;
// }
//add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

$font_eng = '//fonts.googleapis.com/css?family=Montserrat:400,700|Roboto:400,400i,700';
add_editor_style( array( 'inc/editor-style.css', str_replace( ',', '%2C', $font_eng ) ) );



function my_login_logo_url() {
	 return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
	 return 'Official COCO Website';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Change the logo for login
 *
 * https://codex.wordpress.org/Customizing_the_Login_Form
 */
 function my_login_logo() { ?>
     <style type="text/css">
         #login h1 a, .login h1 a {
          background: url(<?php echo get_template_directory_uri(); ?>/dist/img/COCO-logo.svg);
					height:100px;
					width:100px;
					background-size: 100px 100px;
					background-repeat: no-repeat;
         	padding-bottom: 0;
         }
     </style>
 <?php }
 add_action( 'login_enqueue_scripts', 'my_login_logo' );
