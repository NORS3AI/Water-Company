<?php
/**
 * Site footer template part.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$tagline = get_theme_mod( 'starfrost_footer_tagline', __( 'Bacteriostatic Water. Pure. Clean. Quality.', 'starfrost' ) );
$legal   = get_theme_mod( 'starfrost_footer_legal', __( 'For laboratory and research use. Not intended as a substitute for professional medical advice.', 'starfrost' ) );
?>
<footer id="colophon" class="sf-footer" role="contentinfo">
	<div class="sf-container">

		<div class="sf-footer__cols">

			<div class="sf-footer__brand">
				<?php starfrost_logo(); ?>
				<p><?php echo esc_html( $tagline ); ?></p>
			</div>

			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="sf-footer__col"><?php dynamic_sidebar( 'footer-1' ); ?></div>
			<?php else : ?>
				<div class="sf-footer__col">
					<h3 class="sf-widget__title"><?php esc_html_e( 'Shop', 'starfrost' ); ?></h3>
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
				<div class="sf-footer__col"><?php dynamic_sidebar( 'footer-2' ); ?></div>
			<?php else : ?>
				<div class="sf-footer__col">
					<h3 class="sf-widget__title"><?php esc_html_e( 'Company', 'starfrost' ); ?></h3>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Starfrost', 'starfrost' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/quality/' ) ); ?>"><?php esc_html_e( 'Quality', 'starfrost' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'starfrost' ); ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="sf-footer__col"><?php dynamic_sidebar( 'footer-3' ); ?></div>
			<?php else : ?>
				<div class="sf-footer__col">
					<h3 class="sf-widget__title"><?php esc_html_e( 'Support', 'starfrost' ); ?></h3>
					<ul>
						<li><a href="<?php echo esc_url( home_url( '/shipping/' ) ); ?>"><?php esc_html_e( 'Shipping', 'starfrost' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/returns/' ) ); ?>"><?php esc_html_e( 'Returns', 'starfrost' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'starfrost' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/terms/' ) ); ?>"><?php esc_html_e( 'Terms', 'starfrost' ); ?></a></li>
					</ul>
				</div>
			<?php endif; ?>

		</div>

		<div class="sf-footer__bottom">
			<small class="sf-footer__copy">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'starfrost' ); ?>
			</small>
			<small class="sf-footer__legal"><?php echo esc_html( $legal ); ?></small>
		</div>

	</div>
</footer>
