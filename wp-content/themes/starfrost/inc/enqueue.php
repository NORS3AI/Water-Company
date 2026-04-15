<?php
/**
 * Asset registration: stylesheets and scripts.
 *
 * Each stylesheet is registered separately so themers can dequeue specific
 * concerns (e.g. the Elementor compatibility layer) without touching the rest.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Enqueue scripts and styles.
 */
function starfrost_enqueue_assets() {

	$ver = STARFROST_VERSION;
	$css = STARFROST_URI . 'assets/css/';
	$js  = STARFROST_URI . 'assets/js/';

	// Webfonts (loaded via a single preconnect + stylesheet).
	wp_enqueue_style(
		'starfrost-fonts',
		'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap',
		array(),
		null
	);

	// Modular stylesheets - order matters.
	wp_enqueue_style( 'starfrost-tokens',     $css . 'tokens.css',     array( 'starfrost-fonts' ),       $ver );
	wp_enqueue_style( 'starfrost-base',       $css . 'base.css',       array( 'starfrost-tokens' ),      $ver );
	wp_enqueue_style( 'starfrost-layout',     $css . 'layout.css',     array( 'starfrost-base' ),        $ver );
	wp_enqueue_style( 'starfrost-components', $css . 'components.css', array( 'starfrost-layout' ),      $ver );
	wp_enqueue_style( 'starfrost-utilities',  $css . 'utilities.css',  array( 'starfrost-components' ), $ver );

	// Style.css (for the WordPress.org metadata, kept lightweight).
	wp_enqueue_style( 'starfrost-style', get_stylesheet_uri(), array( 'starfrost-utilities' ), $ver );

	// WooCommerce overrides (only when WC is active).
	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'starfrost-woocommerce', $css . 'woocommerce.css', array( 'starfrost-components' ), $ver );
	}

	// Elementor compatibility layer (only when Elementor is active).
	if ( did_action( 'elementor/loaded' ) ) {
		wp_enqueue_style( 'starfrost-elementor', $css . 'elementor.css', array( 'starfrost-components' ), $ver );
	}

	// Theme JS - small, dependency-free, ES module-friendly.
	wp_enqueue_script(
		'starfrost-app',
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
		'starfrost-app',
		'StarfrostData',
		array(
			'ajaxUrl'      => admin_url( 'admin-ajax.php' ),
			'restUrl'      => esc_url_raw( rest_url( 'starfrost/v1/' ) ),
			'nonce'        => wp_create_nonce( 'starfrost_nonce' ),
			'isWoo'        => class_exists( 'WooCommerce' ),
			'cartUrl'      => function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : '',
			'i18n'         => array(
				'addedToCart' => __( 'Added to cart', 'starfrost' ),
				'menu'        => __( 'Menu', 'starfrost' ),
				'close'       => __( 'Close', 'starfrost' ),
			),
		)
	);

	// Comments reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'starfrost_enqueue_assets' );

/**
 * Add a preconnect hint for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array
 */
function starfrost_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'starfrost-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'starfrost_resource_hints', 10, 2 );
