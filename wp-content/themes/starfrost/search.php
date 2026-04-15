<?php
/**
 * The template for displaying search results.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="site-main sf-main sf-main--search">
	<div class="sf-container">

		<header class="sf-page-header">
			<h1 class="sf-page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Results for: %s', 'starfrost' ), '<span class="sf-search-term">' . get_search_query() . '</span>' );
				?>
			</h1>
		</header>

		<?php if ( have_posts() ) : ?>

			<div class="sf-post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'search' );
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
