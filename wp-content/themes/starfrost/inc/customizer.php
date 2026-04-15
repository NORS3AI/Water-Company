<?php
/**
 * Starfrost Theme Customizer.
 *
 * Exposes a small set of brand-level controls. Heavy theming is intentionally
 * delegated to Elementor + the design tokens in assets/css/tokens.css so this
 * stays focused on what a brand owner needs to flip without touching code.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function starfrost_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// ---------------------------------------------------------------------
	// Section: Brand
	// ---------------------------------------------------------------------
	$wp_customize->add_section(
		'starfrost_brand',
		array(
			'title'    => __( 'Starfrost: Brand', 'starfrost' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_setting(
		'starfrost_accent_color',
		array(
			'default'           => '#a5f3fc',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'starfrost_accent_color',
			array(
				'label'    => __( 'Frost accent color', 'starfrost' ),
				'section'  => 'starfrost_brand',
				'settings' => 'starfrost_accent_color',
			)
		)
	);

	$wp_customize->add_setting(
		'starfrost_glow_color',
		array(
			'default'           => '#7dd3fc',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'starfrost_glow_color',
			array(
				'label'    => __( 'Glow color', 'starfrost' ),
				'section'  => 'starfrost_brand',
				'settings' => 'starfrost_glow_color',
			)
		)
	);

	// ---------------------------------------------------------------------
	// Section: Header
	// ---------------------------------------------------------------------
	$wp_customize->add_section(
		'starfrost_header',
		array(
			'title'    => __( 'Starfrost: Header', 'starfrost' ),
			'priority' => 31,
		)
	);

	$wp_customize->add_setting(
		'starfrost_topbar_message',
		array(
			'default'           => __( 'Pure. Sterile. Sourced for the life sciences.', 'starfrost' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'starfrost_topbar_message',
		array(
			'label'   => __( 'Top bar announcement', 'starfrost' ),
			'section' => 'starfrost_header',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'starfrost_show_topbar',
		array(
			'default'           => true,
			'sanitize_callback' => 'rest_sanitize_boolean',
		)
	);
	$wp_customize->add_control(
		'starfrost_show_topbar',
		array(
			'label'   => __( 'Show top announcement bar', 'starfrost' ),
			'section' => 'starfrost_header',
			'type'    => 'checkbox',
		)
	);

	// ---------------------------------------------------------------------
	// Section: Footer
	// ---------------------------------------------------------------------
	$wp_customize->add_section(
		'starfrost_footer',
		array(
			'title'    => __( 'Starfrost: Footer', 'starfrost' ),
			'priority' => 32,
		)
	);

	$wp_customize->add_setting(
		'starfrost_footer_tagline',
		array(
			'default'           => __( 'Bacteriostatic Water — sourced and stored under stringent conditions.', 'starfrost' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'starfrost_footer_tagline',
		array(
			'label'   => __( 'Footer tagline', 'starfrost' ),
			'section' => 'starfrost_footer',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'starfrost_footer_legal',
		array(
			'default'           => __( 'For laboratory and research use. Not intended as a substitute for professional medical advice.', 'starfrost' ),
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'starfrost_footer_legal',
		array(
			'label'   => __( 'Legal disclaimer', 'starfrost' ),
			'section' => 'starfrost_footer',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'starfrost_customize_register' );

/**
 * Output Customizer color overrides as CSS variables on <head>.
 *
 * Keeps brand controls instantly reflected on the front end without rebuilding
 * stylesheets.
 */
function starfrost_customizer_css() {
	$accent = get_theme_mod( 'starfrost_accent_color', '#a5f3fc' );
	$glow   = get_theme_mod( 'starfrost_glow_color', '#7dd3fc' );
	?>
	<style id="starfrost-customizer-vars">
		:root {
			--sf-color-frost: <?php echo esc_attr( $accent ); ?>;
			--sf-color-glacier: <?php echo esc_attr( $glow ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'starfrost_customizer_css', 99 );
