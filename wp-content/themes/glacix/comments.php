<?php
/**
 * The template for displaying comments.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="gx-comments">

	<?php if ( have_comments() ) : ?>

		<h2 class="gx-comments__title">
			<?php
			$glacix_comment_count = get_comments_number();
			if ( '1' === $glacix_comment_count ) {
				printf(
					/* translators: 1: post title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'glacix' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count, 2: post title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $glacix_comment_count, 'comments title', 'glacix' ) ),
					number_format_i18n( $glacix_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<ol class="gx-comments__list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation(
			array(
				'prev_text' => esc_html__( 'Older comments', 'glacix' ),
				'next_text' => esc_html__( 'Newer comments', 'glacix' ),
			)
		);

		if ( ! comments_open() ) :
			?>
			<p class="gx-comments__closed"><?php esc_html_e( 'Comments are closed.', 'glacix' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form(); ?>

</div>
