<?php
/**
 * ATOMS Theme Customizer
 * 
 * @package ATOMS
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add postMessage support for site title and tagline.
 * 
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function atoms_customize_register( $wp_customize ) {
	// Add color settings
	$wp_customize->add_setting(
		'atoms_primary_color',
		array(
			'default'           => '#C00000',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'atoms_primary_color',
			array(
				'label'    => esc_html__( 'Primary Color', 'atoms' ),
				'section'  => 'colors',
				'priority' => 10,
			)
		)
	);

	// Add background color settings
	$wp_customize->add_setting(
		'atoms_background_color',
		array(
			'default'           => '#121212',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'atoms_background_color',
			array(
				'label'    => esc_html__( 'Background Color', 'atoms' ),
				'section'  => 'colors',
				'priority' => 11,
			)
		)
	);
}
add_action( 'customize_register', 'atoms_customize_register' );

/**
 * Binds JS listener to make Customizer preview reload changes asynchronously.
 */
function atoms_customize_preview_js() {
	wp_enqueue_script(
		'atoms-customizer-preview',
		get_theme_file_uri( '/assets/js/customizer-preview.js' ),
		array( 'customize-preview' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'atoms_customize_preview_js' );
