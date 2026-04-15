<?php
/**
 * Glacix theme functions and definitions.
 *
 * The bulk of this theme is split into modular files under /inc.
 * functions.php is intentionally kept minimal - it just bootstraps the theme.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme constants.
 */
if ( ! defined( 'GLACIX_VERSION' ) ) {
	define( 'GLACIX_VERSION', '1.0.0' );
}
if ( ! defined( 'GLACIX_DIR' ) ) {
	define( 'GLACIX_DIR', trailingslashit( get_template_directory() ) );
}
if ( ! defined( 'GLACIX_URI' ) ) {
	define( 'GLACIX_URI', trailingslashit( get_template_directory_uri() ) );
}

/**
 * Load modular theme files.
 *
 * Each file is responsible for a single concern. Add new modules here.
 */
$glacix_modules = array(
	'inc/setup.php',          // Theme supports, menus, image sizes.
	'inc/enqueue.php',        // CSS + JS registration.
	'inc/template-tags.php',  // Reusable template helpers.
	'inc/template-functions.php', // Filters + body classes.
	'inc/customizer.php',     // Theme Customizer options.
	'inc/woocommerce.php',    // WooCommerce integration.
	'inc/elementor.php',      // Elementor compatibility.
);

foreach ( $glacix_modules as $glacix_module ) {
	$glacix_module_path = GLACIX_DIR . $glacix_module;
	if ( file_exists( $glacix_module_path ) ) {
		require_once $glacix_module_path;
	}
}
unset( $glacix_modules, $glacix_module, $glacix_module_path );
