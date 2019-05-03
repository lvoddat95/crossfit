<?php
/**
 * Crossfit
 *
 * This file adds the breadcrumb section to the Crossfit Theme.
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

/* Add itemref attribute to link entry-title.*/
add_filter( 'genesis_attr_entry', 'func_crossfit_entry_attr' );
function func_crossfit_entry_attr( $atts ) {

	if ( is_singular() && did_action( 'genesis_before_entry' ) && ! did_action( 'genesis_after_entry' ) ) {

		$atts['itemref'] = 'breadcrumb-section';

	}

	return $atts;

}

/* Set up breadcrumb section.*/
add_action( 'genesis_before', 'func_crossfit_breadcrumb_section_setup' );
function func_crossfit_breadcrumb_section_setup() {

	// Remove default breadcrumb section.
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
	remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_open', 5, 3 );
	remove_action( 'genesis_archive_title_descriptions', 'genesis_do_archive_headings_close', 15, 3 );
	remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
	remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
	remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
	remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
	remove_action( 'genesis_before_loop', 'genesis_do_search_title' );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	// Add custom breadcrumb section.
	add_action( 'func_crossfit_breadcrumb_section', 'genesis_do_posts_page_heading' );
	add_action( 'func_crossfit_breadcrumb_section', 'genesis_do_date_archive_title' );
	add_action( 'func_crossfit_breadcrumb_section', 'genesis_do_taxonomy_title_description' );
	add_action( 'func_crossfit_breadcrumb_section', 'genesis_do_author_title_description' );
	add_action( 'func_crossfit_breadcrumb_section', 'genesis_do_cpt_archive_title_description' );

	// Remove search results and shop page titles.
	add_filter( 'woocommerce_show_page_title', '__return_null' );
	add_filter( 'genesis_search_title_output', '__return_false' );

}

/* Remove default title of 404 pages.*/
add_action( 'genesis_before_content', 'func_crossfit_remove_404_title' );
function func_crossfit_remove_404_title() {

	if ( is_404() ) {

		add_filter( 'genesis_markup_entry-title_open', '__return_false' );
		add_filter( 'genesis_markup_entry-title_content', '__return_false' );
		add_filter( 'genesis_markup_entry-title_close', '__return_false' );

	}

}

/**
 * Integrate with Genesis Title Toggle plugin
 *
 * @since  1.0.0
 *
 * @author Bill Erickson
 * @link   https://www.billerickson.net/code/genesis-title-toggle-theme-integration
 *
 * @return void
 */
add_action( 'be_title_toggle_remove', 'func_crossfit_genesis_title_toggle' );
function func_crossfit_genesis_title_toggle() {

	remove_action( 'func_crossfit_breadcrumb_section', 'func_crossfit_page_title', 10 );
	remove_action( 'func_crossfit_breadcrumb_section', 'func_crossfit_page_excerpt', 20 );

}

/* Display title in breadcrumb section.*/
add_action( 'func_crossfit_breadcrumb_section', 'func_crossfit_page_title', 10 );
function func_crossfit_page_title() {

	// Add post titles back inside posts loop.
	if ( is_home() || is_archive() || is_category() || is_tag() || is_tax() || is_search() || is_page_template( 'page_blog.php' ) ) {

		add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );

	}

	if ( class_exists( 'WooCommerce' ) && is_shop() ) {

		genesis_markup( array(
			'open'    => '<h1 %s>',
			'close'   => '</h1>',
			'content' => get_the_title( wc_get_page_id( 'shop' ) ),
			'context' => 'entry-title',
		) );

	} elseif ( 'posts' === get_option( 'show_on_front' ) && is_home() ) {

		genesis_markup( array(
			'open'    => '<h1 %s>',
			'close'   => '</h1>',
			'content' => apply_filters( 'func_crossfit_latest_posts_title', __( 'Latest Posts', 'crossfit' ) ),
			'context' => 'entry-title',
		) );

	} elseif ( is_404() ) {

		genesis_markup( array(
			'open'    => '<h1 %s>',
			'close'   => '</h1>',
			'content' => apply_filters( 'genesis_404_entry_title', __( 'Not found, error 404', 'crossfit' ) ),
			'context' => 'entry-title',
		) );

	} elseif ( is_search() ) {

		genesis_markup( array(
			'open'    => '<h1 %s>',
			'close'   => '</h1>',
			'content' => apply_filters( 'genesis_search_title_text', __( 'Search results for: ', 'crossfit' ) ) . get_search_query(),
			'context' => 'entry-title',
		) );

	} elseif ( is_page_template( 'page_blog.php' ) ) {

		do_action( 'genesis_archive_title_descriptions', get_the_title(), '', 'posts-page-description' );

	} elseif ( is_single() || is_singular() ) {

		genesis_do_post_title();

	}

}

/* Display page excerpt.*/
add_action( 'func_crossfit_breadcrumb_section', 'func_crossfit_page_excerpt', 20 );
function func_crossfit_page_excerpt() {

	if( class_exists('ACF') )  {

		$brc_subtitle = get_field('brc_subtitle');
		$brc_desc = get_field('brc_desc');
		$icon_down = get_field('icon_down');

		if ($brc_subtitle) printf( '<span class="subtitle">%s</span>', $brc_subtitle);
		if ($brc_subtitle) printf( '<p itemprop="description">%s</p>', $brc_desc);
	 	if ($icon_down) echo '<a href="javascript:;"><img class="icon-down" src="' . wp_get_attachment_url( $icon_down ) . '"/></a>';
	}
}

/* Callback for dynamic Genesis 'genesis_attr_$context' filter. Add custom attributes for the custom filter.*/
add_filter( 'genesis_attr_breadcrumb-section', 'func_crossfit_breadcrumb_section_attr' );
function func_crossfit_breadcrumb_section_attr( $attr ) {

	$attr['id']   = 'breadcrumb-section';
	$attr['role'] = 'banner';

	return $attr;

}

/* Display the breadcrumb section.*/
add_action( 'genesis_before_content_sidebar_wrap', 'func_crossfit_breadcrumb_section' );
function func_crossfit_breadcrumb_section() {

	// Output breadcrumb section markup.
	genesis_markup( array(
		'open'    => '<section %s><div class="container">',
		'context' => 'breadcrumb-section',
	) );

	/**
	 * Do breadcrumb section hook.
	 *
	 * @hooked func_crossfit_page_title - 10
	 * @hooked func_crossfit_page_excerpt - 20
	 * @hooked genesis_do_posts_page_heading
	 * @hooked genesis_do_date_archive_title
	 * @hooked genesis_do_blog_template_heading
	 * @hooked genesis_do_taxonomy_title_description
	 * @hooked genesis_do_author_title_description
	 * @hooked genesis_do_cpt_archive_title_description
	 */
	do_action( 'func_crossfit_breadcrumb_section' );

	// Output breadcrumb section markup.
	genesis_markup( array(
		'close'   => '</div></section>',
		'context' => 'breadcrumb-section',
	) );

}
