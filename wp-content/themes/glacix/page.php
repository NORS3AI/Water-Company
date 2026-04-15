<?php
/**
 * The template for displaying single pages.
 *
 * Pages built with Elementor will bypass most of this markup automatically;
 * this file remains the safe fallback for pages built with the block editor
 * or the classic editor.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<main id="primary" class="site-main gx-main gx-main--page">
	<div class="gx-container gx-container--narrow">

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content/content', 'page' );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>

	</div>
</main>

<?php
get_footer();
