<?php
/**
 * ATOMS Theme Functions
 * 
 * @package ATOMS
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Define theme constants
define( 'ATOMS_VERSION', '1.0.0' );
define( 'ATOMS_DIR', get_template_directory() );
define( 'ATOMS_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function atoms_setup() {
	// Add theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo' );
	add_theme_support( 'elementor' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-colors' );
	add_theme_support( 'responsive-embeds' );

	// Set content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1200;
	}

	// Register menu locations
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'atoms' ),
		'footer'  => esc_html__( 'Footer Menu', 'atoms' ),
	) );
}
add_action( 'after_setup_theme', 'atoms_setup' );

/**
 * Enqueue Scripts and Styles
 */
function atoms_enqueue_assets() {
	// Google Fonts
	wp_enqueue_style( 'atoms-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;700&family=Inter:wght@400;500;600;700&family=Cinzel:wght@400;500;700&display=swap', array(), ATOMS_VERSION );

	// Main stylesheet
	wp_enqueue_style( 'atoms-style', ATOMS_URI . '/style.css', array( 'atoms-fonts' ), ATOMS_VERSION );

	// Responsive styles
	wp_enqueue_style( 'atoms-responsive', ATOMS_URI . '/assets/css/responsive.css', array( 'atoms-style' ), ATOMS_VERSION );

	// JavaScript
	wp_enqueue_script( 'atoms-main', ATOMS_URI . '/assets/js/main.js', array( 'jquery' ), ATOMS_VERSION, true );
	wp_enqueue_script( 'atoms-customizer', ATOMS_URI . '/assets/js/customizer.js', array( 'jquery' ), ATOMS_VERSION, true );

	// Localize script
	wp_localize_script( 'atoms-main', 'atomsData', array(
		'theme_uri' => ATOMS_URI,
		'ajax_url'  => admin_url( 'admin-ajax.php' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'atoms_enqueue_assets' );

/**
 * Register Sidebars/Widget Areas
 */
function atoms_register_sidebars() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'atoms' ),
		'id'            => 'primary-sidebar',
		'description'   => esc_html__( 'Main sidebar area', 'atoms' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'atoms_register_sidebars' );

/**
 * Add theme colors to color palette
 */
function atoms_add_custom_colors() {
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => esc_html__( 'CTA Red', 'atoms' ),
			'slug'  => 'cta-red',
			'color' => '#C00000',
		),
		array(
			'name'  => esc_html__( 'Hover Red', 'atoms' ),
			'slug'  => 'hover-red',
			'color' => '#D90429',
		),
		array(
			'name'  => esc_html__( 'Background', 'atoms' ),
			'slug'  => 'background',
			'color' => '#121212',
		),
		array(
			'name'  => esc_html__( 'Surface', 'atoms' ),
			'slug'  => 'surface',
			'color' => '#18181B',
		),
		array(
			'name'  => esc_html__( 'Card', 'atoms' ),
			'slug'  => 'card',
			'color' => '#1F1F23',
		),
		array(
			'name'  => esc_html__( 'Text Primary', 'atoms' ),
			'slug'  => 'text-primary',
			'color' => '#F3F4F6',
		),
	) );
}
add_action( 'after_setup_theme', 'atoms_add_custom_colors' );

/**
 * Elementor Support Functions
 */
function atoms_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'atoms_elementor_locations' );

/**
 * Custom excerpt length
 */
function atoms_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'atoms_excerpt_length' );

/**
 * Custom excerpt more text
 */
function atoms_excerpt_more( $more ) {
	return ' <a href="' . get_permalink() . '" class="more-link">Read More</a>';
}
add_filter( 'excerpt_more', 'atoms_excerpt_more' );

/**
 * Sanitize settings
 */
function atoms_sanitize_color( $color ) {
	return sanitize_hex_color( $color );
}

/**
 * ACF Support (if using Advanced Custom Fields)
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-settings',
		'capability' => 'manage_options',
		'icon_url'   => 'dashicons-admin-generic',
	) );
}

/**
 * Admin Styles
 */
function atoms_admin_styles() {
	wp_enqueue_style( 'atoms-admin', ATOMS_URI . '/assets/css/admin.css', array(), ATOMS_VERSION );
}
add_action( 'admin_enqueue_scripts', 'atoms_admin_styles' );

/**
 * Login Page Styles
 */
function atoms_login_logo() {
	echo '<style type="text/css">
		.login h1 a {
			background-image: url(' . ATOMS_URI . '/assets/img/logo.png) !important;
			width: 320px !important;
			height: 65px !important;
			background-size: contain !important;
			background-repeat: no-repeat !important;
			padding-bottom: 30px !important;
		}
	</style>';
}
add_action( 'login_enqueue_scripts', 'atoms_login_logo' );

/**
 * Filter body classes
 */
function atoms_body_classes( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'singular';
	}
	if ( is_front_page() ) {
		$classes[] = 'home-page';
	}
	return $classes;
}
add_filter( 'body_class', 'atoms_body_classes' );
