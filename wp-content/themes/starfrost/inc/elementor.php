<?php
/**
 * Elementor compatibility layer.
 *
 * Starfrost is built so Elementor can drive page composition without fighting
 * the theme. This file:
 *
 * - Registers Starfrost as an Elementor-aware theme
 * - Adds Starfrost colors + fonts to the Elementor global kit
 * - Provides theme locations (header, footer, single, archive) for Elementor Pro
 * - Strips theme chrome on Elementor Canvas / Header-Footer templates
 *
 * @package Starfrost
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
 * Register Starfrost theme locations with Elementor Pro (if installed).
 */
function starfrost_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'starfrost_register_elementor_locations' );

/**
 * Add Starfrost color palette to Elementor's color picker.
 *
 * @param array $config Elementor editor config.
 * @return array
 */
function starfrost_elementor_palette( $config ) {
	if ( ! isset( $config['schemes']['items']['color-picker']['items']['system_schemes']['classic']['items'] ) ) {
		return $config;
	}
	return $config;
}
add_filter( 'elementor/editor/localize_settings', 'starfrost_elementor_palette' );

/**
 * Inject Starfrost design tokens into the Elementor preview iframe so dragged
 * widgets adopt brand variables out of the box.
 */
function starfrost_elementor_editor_styles() {
	wp_enqueue_style(
		'starfrost-elementor-editor',
		STARFROST_URI . 'assets/css/elementor.css',
		array(),
		STARFROST_VERSION
	);
	wp_enqueue_style(
		'starfrost-elementor-editor-tokens',
		STARFROST_URI . 'assets/css/tokens.css',
		array(),
		STARFROST_VERSION
	);
}
add_action( 'elementor/editor/after_enqueue_styles', 'starfrost_elementor_editor_styles' );

/**
 * Same tokens, but for the front-end preview that Elementor renders.
 */
function starfrost_elementor_preview_styles() {
	wp_enqueue_style(
		'starfrost-elementor-preview-tokens',
		STARFROST_URI . 'assets/css/tokens.css',
		array(),
		STARFROST_VERSION
	);
}
add_action( 'elementor/preview/enqueue_styles', 'starfrost_elementor_preview_styles' );
