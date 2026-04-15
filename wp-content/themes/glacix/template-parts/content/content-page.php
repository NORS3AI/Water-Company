<?php
/**
 * Template part for displaying pages.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'gx-page' ); ?>>
	<?php if ( has_post_thumbnail() && ! is_front_page() ) : ?>
		<figure class="gx-page__media">
			<?php the_post_thumbnail( 'glacix-hero' ); ?>
		</figure>
	<?php endif; ?>

	<header class="gx-page__header">
		<h1 class="gx-page__title"><?php the_title(); ?></h1>
	</header>

	<div class="gx-page__content gx-prose">
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
</article>
