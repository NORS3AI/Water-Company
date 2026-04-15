<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="site-main gx-main gx-main--404">
	<div class="gx-container gx-container--narrow gx-404">

		<div class="gx-404__glyph" aria-hidden="true">
			<span class="gx-404__digit">4</span>
			<span class="gx-404__orb"></span>
			<span class="gx-404__digit">4</span>
		</div>

		<h1 class="gx-404__title"><?php esc_html_e( 'Lost in the void.', 'glacix' ); ?></h1>

		<p class="gx-404__text">
			<?php esc_html_e( 'The page you were looking for has drifted out of orbit. Try a search, or head back home.', 'glacix' ); ?>
		</p>

		<div class="gx-404__actions">
			<a class="gx-btn gx-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Return home', 'glacix' ); ?>
			</a>
			<a class="gx-btn gx-btn--ghost" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ?: home_url( '/shop/' ) ); ?>">
				<?php esc_html_e( 'Browse the shop', 'glacix' ); ?>
			</a>
		</div>

		<div class="gx-404__search">
			<?php get_search_form(); ?>
		</div>

	</div>
</main>

<?php
get_footer();
