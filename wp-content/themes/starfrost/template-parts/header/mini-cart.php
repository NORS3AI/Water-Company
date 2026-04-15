<?php
/**
 * Off-canvas cart drawer mount point.
 *
 * Rendered just before </body>. Wraps WooCommerce's mini-cart inside the
 * Starfrost drawer chrome so toggling cart from the header opens it without
 * a page reload.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}
?>

<aside id="sf-cart-drawer" class="sf-drawer" data-sf-drawer="cart" aria-hidden="true">
	<div class="sf-drawer__head">
		<h2 class="sf-drawer__title"><?php esc_html_e( 'Your cart', 'starfrost' ); ?></h2>
		<button type="button" class="sf-drawer__close" data-sf-cart-close aria-label="<?php esc_attr_e( 'Close cart', 'starfrost' ); ?>">
			<svg aria-hidden="true" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
				<line x1="6" y1="6" x2="18" y2="18"></line>
				<line x1="18" y1="6" x2="6" y2="18"></line>
			</svg>
		</button>
	</div>
	<div class="sf-drawer__body">
		<div class="widget_shopping_cart_content">
			<?php woocommerce_mini_cart(); ?>
		</div>
	</div>
</aside>

<div class="sf-drawer-overlay" data-sf-drawer-overlay="cart"></div>
