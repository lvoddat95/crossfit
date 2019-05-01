<?php
/**
 * Crossfit.
 *
 * A template to force full-width layout, remove breadcrumbs, and remove the page title.
 *
 * Template Name: Home
 *
 * @package Crossfit
 * @author  MaiTemcrossfit    
 */

add_action( 'genesis_meta', 'refined_category_genesis_meta' );
/**
 * Add widget support for category index. If no widgets active, display the default loop.
 *
 * @since 1.0.0
 */
function refined_category_genesis_meta() {

	if ( is_active_sidebar( 'category-index' ) ) {

		//remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'refined_category_sections' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );

	}

}

/**
 * Function to output the category index widget area in the Genesis loop.
 *
 * @since 1.0.0
 */
function refined_category_sections() {

	genesis_widget_area( 'category-index', array(
		'before' => '<div class="category-index widget-area">',
		'after'  => '</div>',
	));

}

// Run Genesis.
genesis();
