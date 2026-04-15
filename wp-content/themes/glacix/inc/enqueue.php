<?php
/**
 * Asset registration: stylesheets and scripts.
 *
 * Each stylesheet is registered separately so themers can dequeue specific
 * concerns (e.g. the Elementor compatibility layer) without touching the rest.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue scripts and styles.
 */
function glacix_enqueue_assets() {

	$ver = GLACIX_VERSION;
	$css = GLACIX_URI . 'assets/css/';
	$js  = GLACIX_URI . 'assets/js/';

	// Webfonts (loaded via a single preconnect + stylesheet).
	wp_enqueue_style(
		'glacix-fonts',
		'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap',
		array(),
		null
	);

	// Modular stylesheets - order matters.
	wp_enqueue_style( 'glacix-tokens',     $css . 'tokens.css',     array( 'glacix-fonts' ),       $ver );
	wp_enqueue_style( 'glacix-base',       $css . 'base.css',       array( 'glacix-tokens' ),      $ver );
	wp_enqueue_style( 'glacix-layout',     $css . 'layout.css',     array( 'glacix-base' ),        $ver );
	wp_enqueue_style( 'glacix-components', $css . 'components.css', array( 'glacix-layout' ),      $ver );
	wp_enqueue_style( 'glacix-utilities',  $css . 'utilities.css',  array( 'glacix-components' ), $ver );

	// Style.css (for the WordPress.org metadata, kept lightweight).
	wp_enqueue_style( 'glacix-style', get_stylesheet_uri(), array( 'glacix-utilities' ), $ver );

	// WooCommerce overrides (only when WC is active).
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'glacix-woocommerce', $css . 'woocommerce.css', array( 'glacix-components' ), $ver );
	}

	// Elementor compatibility layer (only when Elementor is active).
	if ( did_action( 'elementor/loaded' ) ) {
		wp_enqueue_style( 'glacix-elementor', $css . 'elementor.css', array( 'glacix-components' ), $ver );
	}

	// Theme JS - small, dependency-free, ES module-friendly.
	wp_enqueue_script(
		'glacix-app',
		$js . 'app.js',
		array(),
		$ver,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);

	// Pass a small data object to JS.
	wp_localize_script(
		'glacix-app',
		'GlacixData',
		array(
			'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
			'restUrl'      => esc_url_raw( rest_url( 'glacix/v1/' ) ),
			'nonce'        => wp_create_nonce( 'glacix_nonce' ),
			'isWoo'        => class_exists( 'WooCommerce' ),
			'cartUrl'      => function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : '',
			'i18n'         => array(
				'addedToCart' => __( 'Added to cart', 'glacix' ),
				'menu'        => __( 'Menu', 'glacix' ),
				'close'       => __( 'Close', 'glacix' ),
			),
		)
	);

	// Comments reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'glacix_enqueue_assets' );

/**
 * Add a preconnect hint for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array
 */
function glacix_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'glacix-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'glacix_resource_hints', 10, 2 );
