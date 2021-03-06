<?php
/**
 * Crossfit.
 *
 * This file adds functions to the Crossfit Theme.
 *
 * @package Crossfit
 * @author  
     
 */

// Load child theme textdomain.
load_child_theme_textdomain( 'crossfit' );

add_action( 'genesis_setup', 'custom_setup',15);

function custom_setup() {
	// Starts the engine.
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

	// Adds footer template.
	require_once CHILD_THEME_DIR . '/lib/footer.php';

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

	// Enqueues scripts and styles.
	add_action( 'wp_enqueue_scripts', 'func_crossfit_enqueue_scripts_styles' );
	function func_crossfit_enqueue_scripts_styles() {

		wp_enqueue_style(
			'crossfit-fonts',
			'//fonts.googleapis.com/css?family=Montserrat:400,400i,500,600,700,800,900|Oswald:400,500,600,700',
			array(),
			CHILD_THEME_VERSION
		);

		// https://developer.wordpress.org/resource/dashicons/
		wp_enqueue_style( 'dashicons' );

		//Bootstrap css
	    wp_enqueue_style('cf-bootstrap',CHILD_THEME_URI.'/assets/css/bootstrap/bootstrap.min.css');
	    wp_enqueue_style('cf-bootstrap',CHILD_THEME_URI.'/assets/css/bootstrap/bootstrap-theme.min.css');

	    // load main style
	    wp_enqueue_style('crossfit-theme',CHILD_THEME_URI.'/assets/css/theme.css');
	    wp_enqueue_style('crossfit-gallery',CHILD_THEME_URI.'/assets/css/gallery.css');

	    wp_enqueue_style('toan-css', CHILD_THEME_URI . '/assets/css/toan-css.css');
	    wp_enqueue_style('toan-response-css', CHILD_THEME_URI . '/assets/css/toan-response.css');
	    wp_enqueue_style('responsive-css', CHILD_THEME_URI . '/assets/css/responsive.css');



	    // Inline Style
	    if( class_exists('ACF') )  {
			$custom_css = "";

			if (is_page_template( 'page-templates/programs-pricing.php' )) {
				extract(get_field('crf_pp_sec_5'));
				$custom_css = "	.crf_pp_table table { background-image: url('$crf_wtm_table'); }";
			}

			wp_add_inline_style( 'crossfit-theme', $custom_css );

		}




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

	    wp_enqueue_script('boostrap-js',CHILD_THEME_URI.'/assets/js/bootstrap/bootstrap.min.js');
	    wp_enqueue_script('isotope-js',CHILD_THEME_URI.'/assets/js/masonry.pkgd.min.js');
	    wp_enqueue_script('magnific-popup-js',CHILD_THEME_URI.'/assets/js/jquery.magnific-popup.js');

		if( class_exists('ACF') )  {
		    // Map script
			$api_key = get_field('google_api','option');
		    wp_enqueue_script( 'google-map', "//maps.google.com/maps/api/js?key=".$api_key, array('jquery'), null, true );
		    wp_enqueue_script( 'crf-script-map', CHILD_THEME_URI . '/assets/js/map.js',array('jquery'),null,true);
		}



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
	));

	// Adds custom logo in Customizer > Site Identity.
	add_theme_support( 'custom-logo', array(
		'height'      => 274,
		'width'       => 279,
		'flex-height' => true,
		'flex-width'  => true,
	));

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

	// Removes header right widget area.
	unregister_sidebar( 'header-right' );

	// Removes secondary sidebar.
	unregister_sidebar( 'sidebar-alt' );

	// Removes site layouts.
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
	genesis_unregister_layout( 'sidebar-content' );


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

	// Remove Footer
	 remove_action('genesis_footer', 'genesis_do_footer');




	// Default layout full-width
	genesis_set_default_layout( 'full-width-content' );



	add_action( 'genesis_before_content_sidebar_wrap', 'crf_before_content_sidebar_wrap' );
	function crf_before_content_sidebar_wrap() {
		if ( !is_page_template() || is_page_template('page-templates/blog.php') ) echo '<div class="content-container container">';
	}

	add_action( 'genesis_after_content_sidebar_wrap', 'crf_after_content_sidebar_wrap' );
	function crf_after_content_sidebar_wrap() {
	    if (!is_page_template() || is_page_template('page-templates/blog.php') ) echo '</div>';
	}

	add_action( 'loop_start', 'crf_genesis_before_content' );
	if( !function_exists('crf_genesis_before_content') ) {
		function crf_genesis_before_content() {
			$attr = '';
			if( class_exists('ACF') )  {
				$blog_massonry = get_field('blog_massonry','option');
			}
			if ($blog_massonry == true && !is_single()) $attr = 'blog-masonry';
		    if (!is_page_template() || is_page_template('page-templates/blog.php') ) echo '<div class="loop-wrap '.$attr.'">';
		}
	}

	add_action( 'loop_end', 'crf_genesis_after_content' );
	if( !function_exists('crf_genesis_after_content') ) {
		function crf_genesis_after_content() {
		   if (!is_page_template() || is_page_template('page-templates/blog.php') ) echo '</div>';
		}
	}





	// Tesimonials title
	add_action( 'gts', 'crf_gts_title', 7 );
	function crf_gts_title() {
		echo '<h5 class="author" itemprop="author">' . get_the_title() . '</h5>';
	}

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'position'      => 30,
			'redirect'		=> false
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Footer Settings',
			'menu_title'	=> 'Footer Settings',
			'parent_slug'	=> 'theme-general-settings',
		));
		
	}

	if( class_exists('ACF') )  {
		add_filter('acf/fields/google_map/api', 'crf_acf_google_map_api');
		function crf_acf_google_map_api( $api ){

			$key ='AIzaSyAHslBiwa0b2uLygm62Jv_foXPqdraI6t4';
			$api['key'] = $key;
			
			return $api;
			
		}
	}

	add_filter( 'theme_page_templates', 'crf_remove_genesis_page_template_default' );
	function crf_remove_genesis_page_template_default( $page_templates ) {
		unset( $page_templates['page_archive.php'] );
		unset( $page_templates['page_blog.php'] );
		return $page_templates;
	}


	// Sticky header
	if( class_exists('ACF') )  {
		$sticky_header = get_field('sticky_header','option');
		if ($sticky_header == true) {
			add_filter( 'genesis_attr_site-header', 'crf_add_class_menu_sticky' );
			function crf_add_class_menu_sticky( $attributes ) {
			  $attributes['class'] = $attributes['class']. ' menu-sticky';
			    return $attributes;
			}
	}
	}


	// Remove comments

	add_action('admin_init', function () {
	    // Redirect any user trying to access comments page
	    global $pagenow;
	    
	    if ($pagenow === 'edit-comments.php') {
	        wp_redirect(admin_url());
	        exit;
	    }

	    // Remove comments metabox from dashboard
	    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

	    // Disable support for comments and trackbacks in post types
	    foreach (get_post_types() as $post_type) {
	        if (post_type_supports($post_type, 'comments')) {
	            remove_post_type_support($post_type, 'comments');
	            remove_post_type_support($post_type, 'trackbacks');
	        }
	    }
	});

	// Close comments on the front-end
	add_filter('comments_open', '__return_false', 20, 2);
	add_filter('pings_open', '__return_false', 20, 2);

	// Hide existing comments
	add_filter('comments_array', '__return_empty_array', 10, 2);

	// Remove comments page in menu
	add_action('admin_menu', function () {
	    remove_menu_page('edit-comments.php');
	});

	// Remove comments links from admin bar
	add_action('init', function () {
	    if (is_admin_bar_showing()) {
	        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	    }
	});


}
add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle ) 
{
    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}