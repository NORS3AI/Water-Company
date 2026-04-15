<?php
/**
 * Site header template part.
 *
 * Outputs the optional top announcement bar, the main navbar with brand,
 * primary nav, search trigger, account link and cart link.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$show_topbar    = (bool) get_theme_mod( 'glacix_show_topbar', true );
$topbar_message = get_theme_mod( 'glacix_topbar_message', __( 'Bacteriostatic Water. Pure. Clean. Quality.', 'glacix' ) );
?>

<?php if ( $show_topbar && ! empty( $topbar_message ) ) : ?>
	<div class="gx-topbar" role="region" aria-label="<?php esc_attr_e( 'Announcement', 'glacix' ); ?>">
		<div class="gx-container gx-topbar__inner">
			<span class="gx-topbar__message">
				<span class="gx-topbar__dot" aria-hidden="true"></span>
				<?php echo esc_html( $topbar_message ); ?>
			</span>

			<?php
			if ( has_nav_menu( 'utility' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'utility',
						'container'      => false,
						'menu_class'     => 'gx-topbar__nav',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			}
			?>
		</div>
	</div>
<?php endif; ?>

<header id="masthead" class="gx-header" role="banner">
	<div class="gx-container gx-header__inner">

		<div class="gx-header__brand">
			<?php glacix_logo(); ?>
		</div>

		<nav class="gx-header__nav" aria-label="<?php esc_attr_e( 'Primary', 'glacix' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'gx-nav',
						'depth'          => 2,
					)
				);
			} else {
				echo '<ul class="gx-nav">';
				echo '<li><a href="' . esc_url( home_url( '/shop/' ) ) . '">' . esc_html__( 'Shop', 'glacix' ) . '</a></li>';
				echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">' . esc_html__( 'About', 'glacix' ) . '</a></li>';
				echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Contact', 'glacix' ) . '</a></li>';
				echo '</ul>';
			}
			?>
		</nav>

		<div class="gx-header__actions">

			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a class="gx-icon-btn gx-icon-btn--account" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" aria-label="<?php esc_attr_e( 'My account', 'glacix' ); ?>">
					<svg aria-hidden="true" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="8" r="4"></circle>
						<path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>
					</svg>
				</a>

				<?php glacix_cart_link(); ?>
			<?php endif; ?>

			<button type="button" class="gx-burger" data-gx-burger aria-label="<?php esc_attr_e( 'Open menu', 'glacix' ); ?>" aria-controls="gx-mobile-drawer">
				<svg aria-hidden="true" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
					<line x1="4" y1="7" x2="20" y2="7"></line>
					<line x1="4" y1="12" x2="20" y2="12"></line>
					<line x1="4" y1="17" x2="20" y2="17"></line>
				</svg>
			</button>

		</div>
	</div>
</header>

<aside id="gx-mobile-drawer" class="gx-drawer" data-gx-drawer="mobile" aria-hidden="true">
	<div class="gx-drawer__head">
		<h2 class="gx-drawer__title"><?php esc_html_e( 'Menu', 'glacix' ); ?></h2>
		<button type="button" class="gx-drawer__close" data-gx-drawer-close aria-label="<?php esc_attr_e( 'Close menu', 'glacix' ); ?>">
			<svg aria-hidden="true" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
				<line x1="6" y1="6" x2="18" y2="18"></line>
				<line x1="18" y1="6" x2="6" y2="18"></line>
			</svg>
		</button>
	</div>
	<div class="gx-drawer__body">
		<?php
		if ( has_nav_menu( 'mobile' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'mobile',
					'container'      => false,
					'menu_class'     => 'gx-mobile-nav',
				)
			);
		} elseif ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'gx-mobile-nav',
				)
			);
		}
		?>
	</div>
</aside>

<div class="gx-drawer-overlay" data-gx-drawer-overlay></div>
