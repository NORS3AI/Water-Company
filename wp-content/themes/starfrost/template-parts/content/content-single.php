<?php
/**
 * Template part for displaying a single post.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sf-single' ); ?>>

	<header class="sf-single__header">
		<div class="sf-single__meta">
			<?php starfrost_posted_on(); ?>
			<?php starfrost_posted_by(); ?>
		</div>
		<h1 class="sf-single__title"><?php the_title(); ?></h1>
	</header>

	<?php starfrost_post_thumbnail(); ?>

	<div class="sf-single__content sf-prose">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'starfrost' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="sf-single__footer">
		<?php starfrost_entry_footer(); ?>
	</footer>
</article>
