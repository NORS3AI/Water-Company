<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="site-main sf-main sf-main--404">
	<div class="sf-container sf-container--narrow sf-404">

		<div class="sf-404__glyph" aria-hidden="true">
			<span class="sf-404__digit">4</span>
			<span class="sf-404__orb"></span>
			<span class="sf-404__digit">4</span>
		</div>

		<h1 class="sf-404__title"><?php esc_html_e( 'Lost in the void.', 'starfrost' ); ?></h1>

		<p class="sf-404__text">
			<?php esc_html_e( 'The page you were looking for has drifted out of orbit. Try a search, or head back home.', 'starfrost' ); ?>
		</p>

		<div class="sf-404__actions">
			<a class="sf-btn sf-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php esc_html_e( 'Return home', 'starfrost' ); ?>
			</a>
			<a class="sf-btn sf-btn--ghost" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ?: home_url( '/shop/' ) ); ?>">
				<?php esc_html_e( 'Browse the shop', 'starfrost' ); ?>
			</a>
		</div>

		<div class="sf-404__search">
			<?php get_search_form(); ?>
		</div>

	</div>
</main>

<?php
get_footer();
