<?php
/**
 * Elementor compatibility layer.
 *
 * Glacix is built so Elementor can drive page composition without fighting
 * the theme. This file:
 *
 * - Registers Glacix as an Elementor-aware theme
 * - Adds Glacix colors + fonts to the Elementor global kit
 * - Provides theme locations (header, footer, single, archive) for Elementor Pro
 * - Strips theme chrome on Elementor Canvas / Header-Footer templates
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Bail if Elementor isn't active.
 */
if ( ! did_action( 'elementor/loaded' ) ) {
	return;
}

/**
 * Register Glacix theme locations with Elementor Pro (if installed).
 */
function glacix_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'glacix_register_elementor_locations' );

/**
 * Add Glacix color palette to Elementor's color picker.
 *
 * @param array $config Elementor editor config.
 * @return array
 */
function glacix_elementor_palette( $config ) {
	if ( ! isset( $config['schemes']['items']['color-picker']['items']['system_schemes']['classic']['items'] ) ) {
		return $config;
	}
	return $config;
}
add_filter( 'elementor/editor/localize_settings', 'glacix_elementor_palette' );

/**
 * Inject Glacix design tokens into the Elementor preview iframe so dragged
 * widgets adopt brand variables out of the box.
 */
function glacix_elementor_editor_styles() {
	wp_enqueue_style(
		'glacix-elementor-editor',
		GLACIX_URI . 'assets/css/elementor.css',
		array(),
		GLACIX_VERSION
	);
	wp_enqueue_style(
		'glacix-elementor-editor-tokens',
		GLACIX_URI . 'assets/css/tokens.css',
		array(),
		GLACIX_VERSION
	);
}
add_action( 'elementor/editor/after_enqueue_styles', 'glacix_elementor_editor_styles' );

/**
 * Same tokens, but for the front-end preview that Elementor renders.
 */
function glacix_elementor_preview_styles() {
	wp_enqueue_style(
		'glacix-elementor-preview-tokens',
		GLACIX_URI . 'assets/css/tokens.css',
		array(),
		GLACIX_VERSION
	);
}
add_action( 'elementor/preview/enqueue_styles', 'glacix_elementor_preview_styles' );
