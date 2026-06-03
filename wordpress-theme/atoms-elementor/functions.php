<?php
/**
 * ATOMS Elementor Styles Only Package
 * This file extracts and packages Elementor-compatible styles
 * 
 * @package ATOMS-Elementor
 */

// This is a utility file for packaging Elementor styles
// When using this in Elementor, ensure the style.css is properly referenced

/*
 * Elementor Theme Support Declaration
 * Place this in your WordPress theme's functions.php or use the
 * ATOMS Elementor package as a custom elementor theme add-on
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Elementor locations
 */
function atoms_elementor_register_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'atoms_elementor_register_locations' );

/**
 * Enqueue Elementor styles
 */
function atoms_elementor_enqueue_styles() {
	wp_enqueue_style( 'atoms-elementor', get_template_directory_uri() . '/elementor/style.css', array(), ATOMS_VERSION );
}
add_action( 'wp_enqueue_scripts', 'atoms_elementor_enqueue_styles' );
