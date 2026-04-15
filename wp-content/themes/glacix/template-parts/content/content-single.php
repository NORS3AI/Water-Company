<?php
/**
 * Template part for displaying a single post.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'gx-single' ); ?>>

	<header class="gx-single__header">
		<div class="gx-single__meta">
			<?php glacix_posted_on(); ?>
			<?php glacix_posted_by(); ?>
		</div>
		<h1 class="gx-single__title"><?php the_title(); ?></h1>
	</header>

	<?php glacix_post_thumbnail(); ?>

	<div class="gx-single__content gx-prose">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glacix' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="gx-single__footer">
		<?php glacix_entry_footer(); ?>
	</footer>
</article>
