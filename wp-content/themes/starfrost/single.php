<?php
/**
 * The template for displaying all single posts.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="site-main sf-main sf-main--single">
	<div class="sf-container sf-container--narrow">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'single' );

			the_post_navigation(
				array(
					'prev_text' => '<span class="sf-nav-label">' . esc_html__( 'Previous', 'starfrost' ) . '</span> <span class="sf-nav-title">%title</span>',
					'next_text' => '<span class="sf-nav-label">' . esc_html__( 'Next', 'starfrost' ) . '</span> <span class="sf-nav-title">%title</span>',
				)
			);

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>

	</div>
</main>

<?php
get_footer();
