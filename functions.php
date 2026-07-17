<?php
/**
 * Scynexis functions and definitions
 *
 * @package Scynexis
 */

// Add basic theme support if needed in the future.
add_action( 'after_setup_theme', 'scynexis_setup' );
if ( ! function_exists( 'scynexis_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function scynexis_setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );
	}
}

/**
 * Enqueue scripts and styles.
 */
function scynexis_scripts() {
	// Enqueue DM Sans Google Fonts.
	wp_enqueue_style( 'scynexis-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;700&display=swap', array(), null );

	// Enqueue style.css.
	wp_enqueue_style( 'scynexis-style', get_stylesheet_uri(), array( 'scynexis-fonts' ), '1.0.0' );

	// Enqueue main.js.
	wp_enqueue_script( 'scynexis-main', get_template_directory_uri() . '/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'scynexis_scripts' );

