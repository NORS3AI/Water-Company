<?php
/**
 * The header for Glacix.
 *
 * Outputs the document head, opening body tag, skip link, and the site
 * header markup. Header layout is delegated to template-parts/header/site-header.php
 * so it can be swapped out cleanly.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta name="theme-color" content="#000000" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'gx-body' ); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
	<?php esc_html_e( 'Skip to content', 'glacix' ); ?>
</a>

<div id="page" class="gx-site">

	<?php get_template_part( 'template-parts/header/site-header' ); ?>
