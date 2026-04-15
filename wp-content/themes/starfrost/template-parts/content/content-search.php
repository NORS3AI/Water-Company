<?php
/**
 * Template part for displaying search results.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'sf-post-card' ); ?>>
	<?php starfrost_post_thumbnail(); ?>
	<div class="sf-post-card__body">
		<h2 class="sf-post-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="sf-post-card__excerpt"><?php the_excerpt(); ?></div>
	</div>
</article>
