<?php
/**
 * Template part for displaying pages.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sf-page' ); ?>>
	<?php if ( has_post_thumbnail() && ! is_front_page() ) : ?>
		<figure class="sf-page__media">
			<?php the_post_thumbnail( 'starfrost-hero' ); ?>
		</figure>
	<?php endif; ?>

	<header class="sf-page__header">
		<h1 class="sf-page__title"><?php the_title(); ?></h1>
	</header>

	<div class="sf-page__content sf-prose">
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
</article>
