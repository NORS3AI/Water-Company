<?php
/**
 * The footer for Starfrost.
 *
 * Closes #page, prints wp_footer, and closes body/html.
 * Footer markup itself lives in template-parts/footer/site-footer.php.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>

	<?php get_template_part( 'template-parts/footer/site-footer' ); ?>

</div><!-- #page -->

<?php
// Mount points for off-canvas mini-cart and search modal.
get_template_part( 'template-parts/header/mini-cart' );
?>

<?php wp_footer(); ?>
</body>
</html>
