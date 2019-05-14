<?php
/**
 * Crossfit.
 *
 * Onboarding config to load plugins and homepage content on theme activation.
 *
 * @package Crossfit
 * @author  MaiTemcrossfit    
 */

return array(
	'dependencies'     => array(
		'plugins' => array(
			array(
				'name'       => __( 'Atomic Blocks', 'crossfit' ),
				'slug'       => 'advanced-custom-fields-pro/acf.php',
				'public_url' => require dirname( __FILE__ ) . '/import/plugins/advanced-custom-fields-pro-5.8.0.zip',
			),
			array(
				'name'       => __( 'Advanced Custom Fields: Table Field', 'crossfit' ),
				'slug'       => 'advanced-custom-fields-table-field/acf-table.php',
				'public_url' => 'https://wordpress.org/plugins/advanced-custom-fields-table-field/',
			),
			array(
				'name'       => __( 'Contact Form 7', 'crossfit' ),
				'slug'       => 'contact-form-7/wp-contact-form-7.php',
				'public_url' => 'https://wordpress.org/plugins/contact-form-7/',
			),
			array(
				'name'       => __( 'Genesis Testimonial Slider', 'crossfit' ),
				'slug'       => 'wpstudio-testimonial-slider/genesis-testimonials.php',
				'public_url' => 'https://wordpress.org/plugins/wpstudio-testimonial-slider/',
			),
		),
	),
	'content'          => array(
		'homepage' => array(
			'post_title'     => 'CROSSFIT',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/homepage.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/home.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
		'programs'   => array(
			'post_title'     => 'Programs',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/programs.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/programs-pricing.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
		'about'    => array(
			'post_title'     => 'About Us',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/about.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/about-us.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
		'contact'  => array(
			'post_title'     => 'Contact Us',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/contact.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/contact-us.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
		'blog'  => array(
			'post_title'     => 'WOD',
			'post_content'   => require dirname( __FILE__ ) . '/import/content/blog.php',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/blog.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
		'event'  => array(
			'post_title'     => 'Event',
			'post_content'   => '',
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'page_template'  => 'page-templates/event-name.php',
			'comment_status' => 'closed',
			'ping_status'    => 'closed',
		),
	),
	'navigation_menus' => array(
		'header-left' => array(
			'homepage' => array(
				'title' => 'CROSSFIT',
			),
			'programs'   => array(
				'title' => 'Programs/Pricing',
			),
			'about'    => array(
				'title' => 'About Us',
			),
			'contact'  => array(
				'title' => 'Contact Us',
			),
			
			'landing'  => array(
				'title' => 'Landing Page',
			),
		),
		'header-left' => array(
			'about'    => array(
				'title' => 'About Us',
			),
			'blog'  => array(
				'title' => 'WOD',
			),
			'contact'  => array(
				'title' => 'Contact',
			),
		),
	),
);
