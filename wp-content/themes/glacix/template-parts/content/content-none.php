<?php
/**
 * Template part for showing the "nothing found" message.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="gx-no-results">
	<header class="gx-page-header">
		<h1 class="gx-page-title"><?php esc_html_e( 'Nothing here yet.', 'glacix' ); ?></h1>
	</header>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		<p>
			<?php
			printf(
				wp_kses(
					/* translators: %s: URL to add a new post. */
					__( 'Ready to publish your first post? <a href="%s">Get started here.</a>', 'glacix' ),
					array( 'a' => array( 'href' => array() ) )
				),
				esc_url( admin_url( 'post-new.php' ) )
			);
			?>
		</p>

	<?php elseif ( is_search() ) : ?>
		<p><?php esc_html_e( 'Try a different search term — the void is wide.', 'glacix' ); ?></p>
		<?php get_search_form(); ?>

	<?php else : ?>
		<p><?php esc_html_e( 'Nothing matched. Try a search?', 'glacix' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</section>
