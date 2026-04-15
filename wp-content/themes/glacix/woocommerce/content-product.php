<?php
/**
 * The template for displaying product content within loops.
 *
 * Glacix override that delegates rendering to standard WC hooks but ensures
 * each list item is wrapped in a clean <li class="product"> the theme can style.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'gx-product-card', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked Glacix loop item open (link + media open)
	 * @hooked woocommerce_template_loop_product_thumbnail
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash
	 * @hooked Glacix media close
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked Glacix body open
	 * @hooked Glacix loop title
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating
	 * @hooked woocommerce_template_loop_price
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked Glacix loop link close
	 * @hooked Glacix body close
	 * @hooked woocommerce_template_loop_product_link_close (already removed)
	 * @hooked woocommerce_template_loop_add_to_cart
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>

</li>
