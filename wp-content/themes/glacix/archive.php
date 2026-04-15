<?php
/**
 * The template for displaying archive pages.
 *
 * Used as a fallback when more specific archive templates aren't matched.
 * For product archives WooCommerce will load woocommerce/archive-product.php.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="site-main gx-main gx-main--archive">
	<div class="gx-container">

		<?php if ( have_posts() ) : ?>

			<header class="gx-page-header">
				<?php
				the_archive_title( '<h1 class="gx-page-title">', '</h1>' );
				the_archive_description( '<div class="gx-archive-description">', '</div>' );
				?>
			</header>

			<div class="gx-post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', get_post_type() );
				endwhile;
				?>
			</div>

			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => esc_html__( 'Previous', 'glacix' ),
					'next_text' => esc_html__( 'Next', 'glacix' ),
				)
			);
			?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content/content', 'none' ); ?>

		<?php endif; ?>

	</div>
</main>

<?php
get_footer();
