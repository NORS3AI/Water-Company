<?php
/**
 * The template for displaying all single posts.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="site-main gx-main gx-main--single">
	<div class="gx-container gx-container--narrow">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'single' );

			the_post_navigation(
				array(
					'prev_text' => '<span class="gx-nav-label">' . esc_html__( 'Previous', 'glacix' ) . '</span> <span class="gx-nav-title">%title</span>',
					'next_text' => '<span class="gx-nav-label">' . esc_html__( 'Next', 'glacix' ) . '</span> <span class="gx-nav-title">%title</span>',
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
