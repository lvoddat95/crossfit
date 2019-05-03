<?php
/**
 * Crossfit
 *
 * This file adds theme specific functions to the Crossfit Theme.
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;
	
}


// Register Before Footer widget area.
// genesis_register_sidebar( array(
// 	'id'          => 'before-footer',
// 	'name'        => __( 'Before Footer', 'crossfit' ),
// 	'description' => __( 'Before Footer widget area.', 'crossfit' ),
// ) );

// Register Footer 1 widget area.
genesis_register_sidebar( array(
	'id'          => 'footer-1',
	'name'        => __( 'Footer 1', 'crossfit' ),
	'description' => __( 'Footer left widget area.', 'crossfit' ),
) );

// Register Footer 2 widget area.
genesis_register_sidebar( array(
	'id'          => 'footer-2',
	'name'        => __( 'Footer 2', 'crossfit' ),
	'description' => __( 'Footer center widget area.', 'crossfit' ),
) );

// Register Footer 3 widget area.
genesis_register_sidebar( array(
	'id'          => 'footer-3',
	'name'        => __( 'Footer 3', 'crossfit' ),
	'description' => __( 'Footer right widget area.', 'crossfit' ),
) );


// add_action( 'genesis_footer', 'crf_before_footer' );
// function crf_before_footer() {
// 	genesis_widget_area( 'before-footer', array(
// 		'before' => '<div class="before-footer widget-area"><div class="container">',
// 		'after'  => '</div></div>',
// 	) );
// }

// add_action( 'genesis_footer', 'crf_footer_left', 14 );
// function crf_footer_left() {
// 	genesis_widget_area( 'footer-1', array(
// 		'before' => '<div class="footer-1 widget-area"><div class="container">',
// 		'after'  => '</div></div>',
// 	) );
// }

// add_action( 'genesis_footer', 'crf_footer_center', 14 );
// function crf_footer_center() {
// 	genesis_widget_area( 'footer-2', array(
// 		'before' => '<div class="footer-2 widget-area"><div class="container">',
// 		'after'  => '</div></div>',
// 	) );
// }

// add_action( 'genesis_footer', 'crf_footer_right', 14 );
// function crf_footer_right() {
// 	genesis_widget_area( 'footer-3', array(
// 		'before' => '<div class="footer-3 widget-area"><div class="container">',
// 		'after'  => '</div></div>',
// 	) );
// }
