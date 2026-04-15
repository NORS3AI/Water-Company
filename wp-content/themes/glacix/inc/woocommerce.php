<?php
/**
 * WooCommerce integration for Glacix.
 *
 * - Declares theme support
 * - Adjusts default markup wrappers to match Glacix shells
 * - Re-skins loop, single product, cart and checkout
 * - Exposes a header mini-cart fragment for the off-canvas drawer
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Bail early if WooCommerce isn't active.
 */
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Declare WooCommerce theme support.
 */
function glacix_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 400,
			'single_image_width'    => 900,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 4,
			),
		)
	);

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'glacix_woocommerce_setup' );

/**
 * Replace WooCommerce's default content wrapper with Glacix shells.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function glacix_woocommerce_wrapper_start() {
	echo '<main id="primary" class="site-main gx-main gx-main--woo">';
	echo '<div class="gx-container">';
}
add_action( 'woocommerce_before_main_content', 'glacix_woocommerce_wrapper_start', 10 );

function glacix_woocommerce_wrapper_end() {
	echo '</div>';
	echo '</main>';
}
add_action( 'woocommerce_after_main_content', 'glacix_woocommerce_wrapper_end', 10 );

/**
 * Remove the default sidebar from shop pages — Glacix is a clean, full-bleed shop.
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Loop product columns.
 *
 * @return int
 */
function glacix_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'glacix_loop_columns' );

/**
 * Number of products per page.
 *
 * @return int
 */
function glacix_loop_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'glacix_loop_per_page', 20 );

/**
 * Wrap product loop items so we can style cards as a self-contained surface.
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

function glacix_loop_item_open() {
	echo '<a class="gx-product-card__link" href="' . esc_url( get_permalink() ) . '">';
	echo '<div class="gx-product-card__media">';
}
add_action( 'woocommerce_before_shop_loop_item', 'glacix_loop_item_open', 10 );

function glacix_loop_item_media_close() {
	echo '</div>'; // .gx-product-card__media
}
add_action( 'woocommerce_before_shop_loop_item_title', 'glacix_loop_item_media_close', 100 );

function glacix_loop_item_close() {
	echo '</a>'; // .gx-product-card__link
}
add_action( 'woocommerce_after_shop_loop_item', 'glacix_loop_item_close', 5 );

/**
 * Re-order shop loop bits and add the "card body" wrapper.
 */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
function glacix_loop_item_body_open() {
	echo '<div class="gx-product-card__body">';
}
add_action( 'woocommerce_shop_loop_item_title', 'glacix_loop_item_body_open', 5 );

function glacix_loop_item_title() {
	echo '<h3 class="gx-product-card__title">' . esc_html( get_the_title() ) . '</h3>';
}
add_action( 'woocommerce_shop_loop_item_title', 'glacix_loop_item_title', 10 );

function glacix_loop_item_body_close() {
	echo '</div>'; // .gx-product-card__body
}
add_action( 'woocommerce_after_shop_loop_item', 'glacix_loop_item_body_close', 6 );

/**
 * Cart fragments — keeps the header cart count + mini-cart in sync after AJAX add-to-cart.
 *
 * @param array $fragments Existing fragments.
 * @return array
 */
function glacix_cart_fragments( $fragments ) {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		return $fragments;
	}

	ob_start();
	?>
	<span class="gx-cart-link__count" data-gx-cart-count><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
	<?php
	$fragments['span[data-gx-cart-count]'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'glacix_cart_fragments' );

/**
 * Replace the WooCommerce breadcrumb separator with a Glacix glyph.
 *
 * @param array $defaults Default breadcrumb args.
 * @return array
 */
function glacix_breadcrumb_defaults( $defaults ) {
	$defaults['delimiter']   = '<span class="gx-breadcrumb__sep" aria-hidden="true">/</span>';
	$defaults['wrap_before'] = '<nav class="gx-breadcrumb woocommerce-breadcrumb" aria-label="' . esc_attr__( 'Breadcrumb', 'glacix' ) . '">';
	$defaults['wrap_after']  = '</nav>';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'glacix_breadcrumb_defaults' );

/**
 * Override the default "add to cart" button text with brand copy.
 *
 * @return string
 */
function glacix_add_to_cart_text() {
	return __( 'Add to cart', 'glacix' );
}
add_filter( 'woocommerce_product_add_to_cart_text', 'glacix_add_to_cart_text' );
add_filter( 'woocommerce_product_single_add_to_cart_text', 'glacix_add_to_cart_text' );
