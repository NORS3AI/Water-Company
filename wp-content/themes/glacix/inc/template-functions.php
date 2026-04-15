<?php
/**
 * Functions which enhance the theme via filters and actions.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add custom classes to <body>.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function glacix_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'gx-body--archive';
	}
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'gx-body--no-sidebar';
	}
	if ( class_exists( 'WooCommerce' ) ) {
		$classes[] = 'gx-body--has-woo';
	}
	if ( did_action( 'elementor/loaded' ) ) {
		$classes[] = 'gx-body--has-elementor';
	}
	$classes[] = 'gx-theme--void';
	return $classes;
}
add_filter( 'body_class', 'glacix_body_classes' );

/**
 * Add a pingback URL auto-discovery header for singular posts.
 */
function glacix_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'glacix_pingback_header' );

/**
 * Filter the excerpt "more" string.
 *
 * @param string $more The default more string.
 * @return string
 */
function glacix_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'glacix_excerpt_more' );

/**
 * Tighten default excerpt length.
 *
 * @param int $length Default excerpt length.
 * @return int
 */
function glacix_excerpt_length( $length ) {
	return is_admin() ? $length : 28;
}
add_filter( 'excerpt_length', 'glacix_excerpt_length' );
