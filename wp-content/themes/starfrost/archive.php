<?php
/**
 * The template for displaying archive pages.
 *
 * Used as a fallback when more specific archive templates aren't matched.
 * For product archives WooCommerce will load woocommerce/archive-product.php.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="site-main sf-main sf-main--archive">
	<div class="sf-container">

		<?php if ( have_posts() ) : ?>

			<header class="sf-page-header">
				<?php
				the_archive_title( '<h1 class="sf-page-title">', '</h1>' );
				the_archive_description( '<div class="sf-archive-description">', '</div>' );
				?>
			</header>

			<div class="sf-post-grid">
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
					'prev_text' => esc_html__( 'Previous', 'starfrost' ),
					'next_text' => esc_html__( 'Next', 'starfrost' ),
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
