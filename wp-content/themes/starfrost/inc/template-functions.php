<?php
/**
 * Functions which enhance the theme via filters and actions.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add custom classes to <body>.
 *
 * @param array $classes Existing body classes.
 * @return array
 */
function starfrost_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'sf-body--archive';
	}
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'sf-body--no-sidebar';
	}
	if ( class_exists( 'WooCommerce' ) ) {
		$classes[] = 'sf-body--has-woo';
	}
	if ( did_action( 'elementor/loaded' ) ) {
		$classes[] = 'sf-body--has-elementor';
	}
	$classes[] = 'sf-theme--void';
	return $classes;
}
add_filter( 'body_class', 'starfrost_body_classes' );

/**
 * Add a pingback URL auto-discovery header for singular posts.
 */
function starfrost_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'starfrost_pingback_header' );

/**
 * Filter the excerpt "more" string.
 *
 * @param string $more The default more string.
 * @return string
 */
function starfrost_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'starfrost_excerpt_more' );

/**
 * Tighten default excerpt length.
 *
 * @param int $length Default excerpt length.
 * @return int
 */
function starfrost_excerpt_length( $length ) {
	return is_admin() ? $length : 28;
}
add_filter( 'excerpt_length', 'starfrost_excerpt_length' );
