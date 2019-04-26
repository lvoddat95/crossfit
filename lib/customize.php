<?php
/**
 * Crossfit.
 *
 * This file adds the Customizer additions to the Crossfit Theme.
 *
 * @package Crossfit
 * @author  MaiTemcrossfit    
 */

add_action( 'customize_register', 'func_crossfit_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function func_crossfit_customizer_register( $wp_customize ) {

	$wp_customize->add_setting(
		'func_crossfit_link_color',
		array(
			'default'           => func_crossfit_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'func_crossfit_link_color',
			array(
				'description' => __( 'Change the color of post info links, hover color of linked titles, hover color of menu items, and more.', 'crossfit' ),
				'label'       => __( 'Link Color', 'crossfit' ),
				'section'     => 'colors',
				'settings'    => 'func_crossfit_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'func_crossfit_accent_color',
		array(
			'default'           => func_crossfit_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'func_crossfit_accent_color',
			array(
				'description' => __( 'Change the default hover color for button links, the menu button, and submit buttons. This setting does not apply to buttons created with the Buttons block.', 'crossfit' ),
				'label'       => __( 'Accent Color', 'crossfit' ),
				'section'     => 'colors',
				'settings'    => 'func_crossfit_accent_color',
			)
		)
	);

	$wp_customize->add_setting(
		'func_crossfit_logo_width',
		array(
			'default'           => 350,
			'sanitize_callback' => 'absint',
		)
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		'func_crossfit_logo_width',
		array(
			'label'       => __( 'Logo Width', 'crossfit' ),
			'description' => __( 'The maximum width of the logo in pixels.', 'crossfit' ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'func_crossfit_logo_width',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 100,
			),

		)
	);

}
