<?php
/**
 * Site header template part.
 *
 * Outputs the optional top announcement bar, the main navbar with brand,
 * primary nav, search trigger, account link and cart link.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$show_topbar    = (bool) get_theme_mod( 'starfrost_show_topbar', true );
$topbar_message = get_theme_mod( 'starfrost_topbar_message', __( 'Bacteriostatic Water. Pure. Clean. Quality.', 'starfrost' ) );
?>

<?php if ( $show_topbar && ! empty( $topbar_message ) ) : ?>
	<div class="sf-topbar" role="region" aria-label="<?php esc_attr_e( 'Announcement', 'starfrost' ); ?>">
		<div class="sf-container sf-topbar__inner">
			<span class="sf-topbar__message">
				<span class="sf-topbar__dot" aria-hidden="true"></span>
				<?php echo esc_html( $topbar_message ); ?>
			</span>

			<?php
			if ( has_nav_menu( 'utility' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'utility',
						'container'      => false,
						'menu_class'     => 'sf-topbar__nav',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			}
			?>
		</div>
	</div>
<?php endif; ?>

<header id="masthead" class="sf-header" role="banner">
	<div class="sf-container sf-header__inner">

		<div class="sf-header__brand">
			<?php starfrost_logo(); ?>
		</div>

		<nav class="sf-header__nav" aria-label="<?php esc_attr_e( 'Primary', 'starfrost' ); ?>">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'sf-nav',
						'depth'          => 2,
					)
				);
			} else {
				echo '<ul class="sf-nav">';
				echo '<li><a href="' . esc_url( home_url( '/shop/' ) ) . '">' . esc_html__( 'Shop', 'starfrost' ) . '</a></li>';
				echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">' . esc_html__( 'About', 'starfrost' ) . '</a></li>';
				echo '<li><a href="' . esc_url( home_url( '/contact/' ) ) . '">' . esc_html__( 'Contact', 'starfrost' ) . '</a></li>';
				echo '</ul>';
			}
			?>
		</nav>

		<div class="sf-header__actions">

			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a class="sf-icon-btn sf-icon-btn--account" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" aria-label="<?php esc_attr_e( 'My account', 'starfrost' ); ?>">
					<svg aria-hidden="true" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="8" r="4"></circle>
						<path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>
					</svg>
				</a>

				<?php starfrost_cart_link(); ?>
			<?php endif; ?>

			<button type="button" class="sf-burger" data-sf-burger aria-label="<?php esc_attr_e( 'Open menu', 'starfrost' ); ?>" aria-controls="sf-mobile-drawer">
				<svg aria-hidden="true" viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
					<line x1="4" y1="7" x2="20" y2="7"></line>
					<line x1="4" y1="12" x2="20" y2="12"></line>
					<line x1="4" y1="17" x2="20" y2="17"></line>
				</svg>
			</button>

		</div>
	</div>
</header>

<aside id="sf-mobile-drawer" class="sf-drawer" data-sf-drawer="mobile" aria-hidden="true">
	<div class="sf-drawer__head">
		<h2 class="sf-drawer__title"><?php esc_html_e( 'Menu', 'starfrost' ); ?></h2>
		<button type="button" class="sf-drawer__close" data-sf-drawer-close aria-label="<?php esc_attr_e( 'Close menu', 'starfrost' ); ?>">
			<svg aria-hidden="true" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
				<line x1="6" y1="6" x2="18" y2="18"></line>
				<line x1="18" y1="6" x2="6" y2="18"></line>
			</svg>
		</button>
	</div>
	<div class="sf-drawer__body">
		<?php
		if ( has_nav_menu( 'mobile' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'mobile',
					'container'      => false,
					'menu_class'     => 'sf-mobile-nav',
				)
			);
		} elseif ( has_nav_menu( 'primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'sf-mobile-nav',
				)
			);
		}
		?>
	</div>
</aside>

<div class="sf-drawer-overlay" data-sf-drawer-overlay></div>
