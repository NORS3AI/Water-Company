<?php
/**
 * The template for displaying comments.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="sf-comments">

	<?php if ( have_comments() ) : ?>

		<h2 class="sf-comments__title">
			<?php
			$starfrost_comment_count = get_comments_number();
			if ( '1' === $starfrost_comment_count ) {
				printf(
					/* translators: 1: post title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'starfrost' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count, 2: post title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $starfrost_comment_count, 'comments title', 'starfrost' ) ),
					number_format_i18n( $starfrost_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2>

		<ol class="sf-comments__list">
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
				'prev_text' => esc_html__( 'Older comments', 'starfrost' ),
				'next_text' => esc_html__( 'Newer comments', 'starfrost' ),
			)
		);

		if ( ! comments_open() ) :
			?>
			<p class="sf-comments__closed"><?php esc_html_e( 'Comments are closed.', 'starfrost' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php comment_form(); ?>

</div>
