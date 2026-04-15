<?php
/**
 * Off-canvas cart drawer mount point.
 *
 * Rendered just before </body>. Wraps WooCommerce's mini-cart inside the
 * Glacix drawer chrome so toggling cart from the header opens it without
 * a page reload.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}
?>

<aside id="gx-cart-drawer" class="gx-drawer" data-gx-drawer="cart" aria-hidden="true">
	<div class="gx-drawer__head">
		<h2 class="gx-drawer__title"><?php esc_html_e( 'Your cart', 'glacix' ); ?></h2>
		<button type="button" class="gx-drawer__close" data-gx-cart-close aria-label="<?php esc_attr_e( 'Close cart', 'glacix' ); ?>">
			<svg aria-hidden="true" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
				<line x1="6" y1="6" x2="18" y2="18"></line>
				<line x1="18" y1="6" x2="6" y2="18"></line>
			</svg>
		</button>
	</div>
	<div class="gx-drawer__body">
		<div class="widget_shopping_cart_content">
			<?php woocommerce_mini_cart(); ?>
		</div>
	</div>
</aside>

<div class="gx-drawer-overlay" data-gx-drawer-overlay="cart"></div>
