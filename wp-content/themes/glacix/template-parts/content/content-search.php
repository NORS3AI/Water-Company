<?php
/**
 * Template part for displaying search results.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'gx-post-card' ); ?>>
	<?php glacix_post_thumbnail(); ?>
	<div class="gx-post-card__body">
		<h2 class="gx-post-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="gx-post-card__excerpt"><?php the_excerpt(); ?></div>
	</div>
</article>
