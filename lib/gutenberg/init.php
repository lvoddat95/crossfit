<?php
/**
 * Gutenberg theme support.
 *
 * @package Crossfit
 * @author  MaiTemcrossfit    
 */

add_action( 'wp_enqueue_scripts', 'func_crossfit_enqueue_gutenberg_frontend_styles' );
/**
 * Enqueues Gutenberg front-end styles.
 *
 * @since 2.7.0
 */
function func_crossfit_enqueue_gutenberg_frontend_styles() {

	wp_enqueue_style(
		'crossfit-gutenberg',
		get_stylesheet_directory_uri() . '/lib/gutenberg/front-end.css',
		array( CHILD_THEME_HANDLE ),
		CHILD_THEME_VERSION
	);

}

add_action( 'enqueue_block_editor_assets', 'func_crossfit_block_editor_styles' );
/**
 * Enqueues Gutenberg admin editor fonts and styles.
 *
 * @since 2.7.0
 */
function func_crossfit_block_editor_styles() {

	$block_editor_settings = genesis_get_config( 'block-editor-settings' );

	wp_enqueue_style(
		'crossfit-gutenberg-fonts',
		$block_editor_settings['admin-fonts-url'],
		array(),
		CHILD_THEME_VERSION
	);

}

add_filter( 'body_class', 'func_crossfit_blocks_body_classes' );
/**
 * Adds body classes to help with block styling.
 *
 * - `has-no-blocks` if content contains no blocks.
 * - `first-block-[block-name]` to allow changes based on the first block (such as removing padding above a Cover block).
 * - `first-block-align-[alignment]` to allow styling adjustment if the first block is wide or full-width.
 *
 * @since 2.8.0
 *
 * @param array $classes The original classes.
 * @return array The modified classes.
 */
function func_crossfit_blocks_body_classes( $classes ) {

	if ( ! is_singular() || ! function_exists( 'has_blocks' ) || ! function_exists( 'parse_blocks' ) ) {
		return $classes;
	}

	if ( ! has_blocks() ) {
		$classes[] = 'has-no-blocks';
		return $classes;
	}

	$post_object = get_post( get_the_ID() );
	$blocks      = (array) parse_blocks( $post_object->post_content );

	if ( isset( $blocks[0]['blockName'] ) ) {
		$classes[] = 'first-block-' . str_replace( '/', '-', $blocks[0]['blockName'] );
	}

	if ( isset( $blocks[0]['attrs']['align'] ) ) {
		$classes[] = 'first-block-align-' . $blocks[0]['attrs']['align'];
	}

	return $classes;

}

// Add support for editor styles.
add_theme_support( 'editor-styles' );

// Enqueue editor styles.
add_editor_style( '/lib/gutenberg/style-editor.css' );

// Adds support for block alignments.
add_theme_support( 'align-wide' );

// Make media embeds responsive.
add_theme_support( 'responsive-embeds' );

$func_crossfit_block_editor_settings = genesis_get_config( 'block-editor-settings' );

// Adds support for editor font sizes.
add_theme_support(
	'editor-font-sizes',
	$func_crossfit_block_editor_settings['editor-font-sizes']
);

// Adds support for editor color palette.
add_theme_support(
	'editor-color-palette',
	$func_crossfit_block_editor_settings['editor-color-palette']
);

require_once get_stylesheet_directory() . '/lib/gutenberg/inline-styles.php';

add_action( 'after_setup_theme', 'func_crossfit_content_width', 0 );
/**
 * Set content width to match the “wide” Gutenberg block width.
 */
function func_crossfit_content_width() {

	$block_editor_settings = genesis_get_config( 'block-editor-settings' );

	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound -- See https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/924
	$GLOBALS['content_width'] = apply_filters( 'func_crossfit_content_width', $block_editor_settings['content-width'] );

}
