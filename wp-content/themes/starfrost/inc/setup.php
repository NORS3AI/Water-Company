<?php
/**
 * Theme setup: supports, menus, image sizes, content width.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'starfrost_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for WordPress features.
	 */
	function starfrost_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'starfrost', STARFROST_DIR . 'languages' );

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

		// Starfrost color palette exposed to the block editor.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Void', 'starfrost' ),
					'slug'  => 'void',
					'color' => '#000000',
				),
				array(
					'name'  => __( 'Obsidian', 'starfrost' ),
					'slug'  => 'obsidian',
					'color' => '#0a0a0f',
				),
				array(
					'name'  => __( 'Onyx', 'starfrost' ),
					'slug'  => 'onyx',
					'color' => '#12121a',
				),
				array(
					'name'  => __( 'Graphite', 'starfrost' ),
					'slug'  => 'graphite',
					'color' => '#1f1f2b',
				),
				array(
					'name'  => __( 'Frost', 'starfrost' ),
					'slug'  => 'frost',
					'color' => '#a5f3fc',
				),
				array(
					'name'  => __( 'Glacier', 'starfrost' ),
					'slug'  => 'glacier',
					'color' => '#7dd3fc',
				),
				array(
					'name'  => __( 'Ghost', 'starfrost' ),
					'slug'  => 'ghost',
					'color' => '#f8f8ff',
				),
				array(
					'name'  => __( 'Stardust', 'starfrost' ),
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
				'primary'  => __( 'Primary Menu', 'starfrost' ),
				'footer'   => __( 'Footer Menu', 'starfrost' ),
				'utility'  => __( 'Utility Menu (top bar)', 'starfrost' ),
				'mobile'   => __( 'Mobile Drawer Menu', 'starfrost' ),
			)
		);

		// Register custom image sizes for product cards / hero.
		add_image_size( 'starfrost-product', 800, 800, true );
		add_image_size( 'starfrost-product-thumb', 200, 200, true );
		add_image_size( 'starfrost-hero', 1920, 900, true );
		add_image_size( 'starfrost-card', 720, 480, true );
	}
endif;
add_action( 'after_setup_theme', 'starfrost_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function starfrost_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'starfrost_content_width', 1280 );
}
add_action( 'after_setup_theme', 'starfrost_content_width', 0 );

/**
 * Register widget areas.
 */
function starfrost_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 1', 'starfrost' ),
			'id'            => 'footer-1',
			'description'   => __( 'Appears in the first footer column.', 'starfrost' ),
			'before_widget' => '<section id="%1$s" class="sf-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="sf-widget__title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 2', 'starfrost' ),
			'id'            => 'footer-2',
			'description'   => __( 'Appears in the second footer column.', 'starfrost' ),
			'before_widget' => '<section id="%1$s" class="sf-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="sf-widget__title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 3', 'starfrost' ),
			'id'            => 'footer-3',
			'description'   => __( 'Appears in the third footer column.', 'starfrost' ),
			'before_widget' => '<section id="%1$s" class="sf-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="sf-widget__title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'starfrost_widgets_init' );
