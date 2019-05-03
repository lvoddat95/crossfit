<?php
/**
 * Crossfit.
 *
 * This file adds functions to the Crossfit Theme.
 *
 * @package Crossfit
 * @author  
     
 */

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';
$child_theme = wp_get_theme();

// Defines constants to help enqueue scripts and styles.
define( 'CHILD_THEME_HANDLE', sanitize_title_with_dashes( $child_theme->get( 'Name' ) ) );
define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );
define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

// Sets up the Theme.
require_once CHILD_THEME_DIR . '/lib/theme-defaults.php';

add_action( 'after_setup_theme', 'func_crossfit_localization_setup' );
/**
 * Sets localization (do not remove).
 *
 * @since 1.0.0
 */
function func_crossfit_localization_setup() {

	load_child_theme_textdomain( 'crossfit', CHILD_THEME_DIR . '/languages' );

}

// Adds breadcurmb section.
require_once CHILD_THEME_DIR . '/lib/breadcrumb.php';

// Adds helper functions.
require_once CHILD_THEME_DIR . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once CHILD_THEME_DIR . '/lib/customize.php';

// Adds widget areas.
require_once CHILD_THEME_DIR . '/lib/widgets.php';

// Includes Customizer CSS.
require_once CHILD_THEME_DIR . '/lib/output.php';

// Adds WooCommerce support.
require_once CHILD_THEME_DIR . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once CHILD_THEME_DIR . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once CHILD_THEME_DIR . '/lib/woocommerce/woocommerce-notice.php';

add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
/**
 * Adds Gutenberg opt-in features and styling.
 *
 * @since 2.7.0
 */
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once CHILD_THEME_DIR . '/lib/gutenberg/init.php';
}

add_action( 'wp_enqueue_scripts', 'func_crossfit_enqueue_scripts_styles' );
/**
 * Enqueues scripts and styles.
 *
 * @since 1.0.0
 */
function func_crossfit_enqueue_scripts_styles() {

	wp_enqueue_style(
		'crossfit-fonts',
		'//fonts.googleapis.com/css?family=Montserrat:400,400i,500,600,700,900|Oswald:400,500,600,700',
		array(),
		CHILD_THEME_VERSION
	);

	wp_enqueue_style( 'dashicons' );


	//bootstrap css

    wp_enqueue_style('cf-bootstrap',CHILD_THEME_URI.'/assets/css/bootstrap/bootstrap.min.css');
    wp_enqueue_style('cf-bootstrap',CHILD_THEME_URI.'/assets/css/bootstrap/bootstrap-theme.min.css');
    // load main style
    wp_enqueue_style('crossfit-theme',CHILD_THEME_URI.'/assets/css/theme.css');

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script(
		'crossfit-responsive-menu',
		CHILD_THEME_URI . "/assets/js/responsive-menus{$suffix}.js",
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);

	wp_localize_script(
		'crossfit-responsive-menu',
		'genesis_responsive_menu',
		func_crossfit_responsive_menu_settings()
	);

	wp_enqueue_script(
		'crossfit',
		CHILD_THEME_URI . '/assets/js/crossfit.js',
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);

    //bootstrap js
    wp_enqueue_script('boostrap-js',CHILD_THEME_URI.'/assets/js/bootstrap/bootstrap.min.js');

}

/**
 * Defines responsive menu settings.
 *
 * @since 2.3.0
 */
function func_crossfit_responsive_menu_settings() {

	$settings = array(
		'mainMenu'         => __( 'Menu', 'crossfit' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'crossfit' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-header-left',
				'.nav-header-right',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Adds support for HTML5 markup structure.
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form',
));

// Adds support for accessibility.
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'search-form',
	'skip-links',
));

// Adds custom logo in Customizer > Site Identity.
add_theme_support( 'custom-logo', array(
	'height'      => 274,
	'width'       => 279,
	'flex-height' => true,
	'flex-width'  => true,
));

// Enable support for custom header image or video.
add_theme_support( 'custom-header', array(
	'header-selector'    => '.breadcrumb-section',
	'default-image'      => CHILD_THEME_URI . '/assets/images/breadcrumbs.jpg',
	'wp-head-callback'   => 'func_crossfit_custom_header',
) );

// Register default header (just in case).
register_default_headers( array(
	'child' => array(
		'url'           => '%2$s/assets/images/breadcrumbs.jpg',
		'thumbnail_url' => '%2$s/assets/images/breadcrumbs.jpg',
		'description'   => __( 'Breadcrumb Image', 'crossfit' ),
	),
) );

// Renames primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array(
	'header-left'  => __( 'Header Left', 'crossfit' ),
	'header-right' => __( 'Header Right', 'crossfit' ),
));

//Hook menu to left of logo.
add_action( 'genesis_header', 'func_crossfit_header_left_menu', 6 );
function func_crossfit_header_left_menu() {
	genesis_nav_menu( array(
        'theme_location' => 'header-left',
    ));
}

//Hook menu to right of logo.
add_action( 'genesis_header', 'func_crossfit_header_right_menu', 7 );
function func_crossfit_header_right_menu() {
    genesis_nav_menu( array(
        'theme_location' => 'header-right',
    ));
}

// Adds viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Adds image sizes.
add_image_size( 'sidebar-featured', 75, 75, true );

// Adds support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Adds support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Removes site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Removes output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Repositions the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );

// Reposition the breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'func_crossfit_breadcrumb_section', 'genesis_do_breadcrumbs', 30 );


/* Start Function ToanNgo92 */


require_once CHILD_THEME_DIR . '/function-toan.php';
