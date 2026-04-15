<?php
/**
 * Starfrost theme functions and definitions.
 *
 * The bulk of this theme is split into modular files under /inc.
 * functions.php is intentionally kept minimal - it just bootstraps the theme.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme constants.
 */
if ( ! defined( 'STARFROST_VERSION' ) ) {
	define( 'STARFROST_VERSION', '1.0.0' );
}
if ( ! defined( 'STARFROST_DIR' ) ) {
	define( 'STARFROST_DIR', trailingslashit( get_template_directory() ) );
}
if ( ! defined( 'STARFROST_URI' ) ) {
	define( 'STARFROST_URI', trailingslashit( get_template_directory_uri() ) );
}

/**
 * Load modular theme files.
 *
 * Each file is responsible for a single concern. Add new modules here.
 */
$starfrost_modules = array(
	'inc/setup.php',          // Theme supports, menus, image sizes.
	'inc/enqueue.php',        // CSS + JS registration.
	'inc/template-tags.php',  // Reusable template helpers.
	'inc/template-functions.php', // Filters + body classes.
	'inc/customizer.php',     // Theme Customizer options.
	'inc/woocommerce.php',    // WooCommerce integration.
	'inc/elementor.php',      // Elementor compatibility.
);

foreach ( $starfrost_modules as $starfrost_module ) {
	$starfrost_module_path = STARFROST_DIR . $starfrost_module;
	if ( file_exists( $starfrost_module_path ) ) {
		require_once $starfrost_module_path;
	}
}
unset( $starfrost_modules, $starfrost_module, $starfrost_module_path );
