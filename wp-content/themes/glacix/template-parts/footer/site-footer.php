<?php
/**
 * Site footer template part.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$tagline = get_theme_mod( 'glacix_footer_tagline', __( 'Bacteriostatic Water. Pure. Clean. Quality.', 'glacix' ) );
$legal   = get_theme_mod( 'glacix_footer_legal', __( 'For laboratory and research use. Not intended as a substitute for professional medical advice.', 'glacix' ) );
?>
<footer id="colophon" class="gx-footer" role="contentinfo">
	<div class="gx-container">

		<div class="gx-footer__cols">

			<div class="gx-footer__brand">
				<?php glacix_logo(); ?>
				<p><?php echo esc_html( $tagline ); ?></p>
			</div>

			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="gx-footer__col"><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<?php else : ?>
				<div class="gx-footer__col">
					<h3 class="gx-widget__title"><?php esc_html_e( 'Shop', 'glacix' ); ?></h3>
					<?php
					if ( has_nav_menu( 'footer' ) ) {
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'container'      => false,
								'depth'          => 1,
								'fallback_cb'    => false,
							)
						);
					}
					?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="gx-footer__col"><?php dynamic_sidebar( 'footer-2' ); ?></div>
			<?php else : ?>
				<div class="gx-footer__col">
					<h3 class="gx-widget__title"><?php esc_html_e( 'Company', 'glacix' ); ?></h3>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Glacix', 'glacix' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/quality/' ) ); ?>"><?php esc_html_e( 'Quality', 'glacix' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'glacix' ); ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="gx-footer__col"><?php dynamic_sidebar( 'footer-3' ); ?></div>
			<?php else : ?>
				<div class="gx-footer__col">
					<h3 class="gx-widget__title"><?php esc_html_e( 'Support', 'glacix' ); ?></h3>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/shipping/' ) ); ?>"><?php esc_html_e( 'Shipping', 'glacix' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/returns/' ) ); ?>"><?php esc_html_e( 'Returns', 'glacix' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'glacix' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'glacix' ); ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

		</div>

		<div class="gx-footer__bottom">
			<small class="gx-footer__copy">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'glacix' ); ?>
			</small>
			<small class="gx-footer__legal"><?php echo esc_html( $legal ); ?></small>
		</div>

	</div>
</footer>
