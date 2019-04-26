<?php
/**
 * Block Editor settings specific to Crossfit.
 *
 * @package Crossfit
 * @author  MaiTemcrossfit    
 */

$func_crossfit_link_color            = get_theme_mod( 'func_crossfit_link_color', func_crossfit_customizer_get_default_link_color() );
$func_crossfit_link_color_contrast   = func_crossfit_color_contrast( $func_crossfit_link_color );
$func_crossfit_link_color_brightness = func_crossfit_color_brightness( $func_crossfit_link_color, 35 );

return array(
	'admin-fonts-url'              => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
	'content-width'                => 1062,
	'default-button-bg'            => $func_crossfit_link_color,
	'default-button-color'         => $func_crossfit_link_color_contrast,
	'default-button-outline-hover' => $func_crossfit_link_color_brightness,
	'default-link-color'           => $func_crossfit_link_color,
	'editor-color-palette'         => array(
		array(
			'name'  => __( 'Custom color', 'crossfit' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => get_theme_mod( 'func_crossfit_link_color', func_crossfit_customizer_get_default_link_color() ),
		),
		array(
			'name'  => __( 'Accent color', 'crossfit' ),
			'slug'  => 'theme-secondary',
			'color' => get_theme_mod( 'func_crossfit_accent_color', func_crossfit_customizer_get_default_accent_color() ),
		),
	),
	'editor-font-sizes'            => array(
		array(
			'name' => __( 'Small', 'crossfit' ),
			'size' => 12,
			'slug' => 'small',
		),
		array(
			'name' => __( 'Normal', 'crossfit' ),
			'size' => 18,
			'slug' => 'normal',
		),
		array(
			'name' => __( 'Large', 'crossfit' ),
			'size' => 20,
			'slug' => 'large',
		),
		array(
			'name' => __( 'Larger', 'crossfit' ),
			'size' => 24,
			'slug' => 'larger',
		),
	),
);
