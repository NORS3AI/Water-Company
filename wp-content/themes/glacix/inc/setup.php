<?php
/**
 * Theme setup: supports, menus, image sizes, content width.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'glacix_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for WordPress features.
	 */
	function glacix_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'glacix', GLACIX_DIR . 'languages' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Automatic feed links.
		add_theme_support( 'automatic-feed-links' );

		// Featured images.
		add_theme_support( 'post-thumbnails' );

		// HTML5 markup.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 64,
				'width'       => 220,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Align wide / full for the block editor.
		add_theme_support( 'align-wide' );

		// Editor styles - keeps the block editor in sync with the void aesthetic.
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor.css' );

		// Glacix color palette exposed to the block editor.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Void', 'glacix' ),
					'slug'  => 'void',
					'color' => '#000000',
				),
				array(
					'name'  => __( 'Obsidian', 'glacix' ),
					'slug'  => 'obsidian',
					'color' => '#0a0a0f',
				),
				array(
					'name'  => __( 'Onyx', 'glacix' ),
					'slug'  => 'onyx',
					'color' => '#12121a',
				),
				array(
					'name'  => __( 'Graphite', 'glacix' ),
					'slug'  => 'graphite',
					'color' => '#1f1f2b',
				),
				array(
					'name'  => __( 'Frost', 'glacix' ),
					'slug'  => 'frost',
					'color' => '#a5f3fc',
				),
				array(
					'name'  => __( 'Glacier', 'glacix' ),
					'slug'  => 'glacier',
					'color' => '#7dd3fc',
				),
				array(
					'name'  => __( 'Ghost', 'glacix' ),
					'slug'  => 'ghost',
					'color' => '#f8f8ff',
				),
				array(
					'name'  => __( 'Stardust', 'glacix' ),
					'slug'  => 'stardust',
					'color' => '#8a8aa0',
				),
			)
		);

		// Disable custom colors so editors stay on-palette.
		add_theme_support( 'disable-custom-colors' );

		// Register navigation menus.
		register_nav_menus(
			array(
				'primary'  => __( 'Primary Menu', 'glacix' ),
				'footer'   => __( 'Footer Menu', 'glacix' ),
				'utility'  => __( 'Utility Menu (top bar)', 'glacix' ),
				'mobile'   => __( 'Mobile Drawer Menu', 'glacix' ),
			)
		);

		// Register custom image sizes for product cards / hero.
		add_image_size( 'glacix-product', 800, 800, true );
		add_image_size( 'glacix-product-thumb', 200, 200, true );
		add_image_size( 'glacix-hero', 1920, 900, true );
		add_image_size( 'glacix-card', 720, 480, true );
	}
endif;
add_action( 'after_setup_theme', 'glacix_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function glacix_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'glacix_content_width', 1280 );
}
add_action( 'after_setup_theme', 'glacix_content_width', 0 );

/**
 * Register widget areas.
 */
function glacix_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 1', 'glacix' ),
			'id'            => 'footer-1',
			'description'   => __( 'Appears in the first footer column.', 'glacix' ),
			'before_widget' => '<section id="%1$s" class="gx-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="gx-widget__title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 2', 'glacix' ),
			'id'            => 'footer-2',
			'description'   => __( 'Appears in the second footer column.', 'glacix' ),
			'before_widget' => '<section id="%1$s" class="gx-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="gx-widget__title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 3', 'glacix' ),
			'id'            => 'footer-3',
			'description'   => __( 'Appears in the third footer column.', 'glacix' ),
			'before_widget' => '<section id="%1$s" class="gx-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="gx-widget__title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'glacix_widgets_init' );
