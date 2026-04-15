<?php
/**
 * Glacix Theme Customizer.
 *
 * Exposes a small set of brand-level controls. Heavy theming is intentionally
 * delegated to Elementor + the design tokens in assets/css/tokens.css so this
 * stays focused on what a brand owner needs to flip without touching code.
 *
 * @package Glacix
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function glacix_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// ---------------------------------------------------------------------
	// Section: Brand
	// ---------------------------------------------------------------------
	$wp_customize->add_section(
		'glacix_brand',
		array(
			'title'       => __( 'Glacix: Brand', 'glacix' ),
			'description' => sprintf(
				/* translators: %s: link to Site Identity section */
				__( 'Looking to upload your company logo? It lives in %s. Drop in a PNG or SVG and it will replace the wordmark in the header automatically.', 'glacix' ),
				'<a href="javascript:wp.customize.section( \'title_tagline\' ).focus();">' . esc_html__( 'Site Identity → Site Logo', 'glacix' ) . '</a>'
			),
			'priority'    => 30,
		)
	);

	$wp_customize->add_setting(
		'glacix_accent_color',
		array(
			'default'           => '#a5f3fc',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'glacix_accent_color',
			array(
				'label'    => __( 'Frost accent color', 'glacix' ),
				'section'  => 'glacix_brand',
				'settings' => 'glacix_accent_color',
			)
		)
	);

	$wp_customize->add_setting(
		'glacix_glow_color',
		array(
			'default'           => '#7dd3fc',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'glacix_glow_color',
			array(
				'label'    => __( 'Glow color', 'glacix' ),
				'section'  => 'glacix_brand',
				'settings' => 'glacix_glow_color',
			)
		)
	);

	// ---------------------------------------------------------------------
	// Section: Header
	// ---------------------------------------------------------------------
	$wp_customize->add_section(
		'glacix_header',
		array(
			'title'    => __( 'Glacix: Header', 'glacix' ),
			'priority' => 31,
		)
	);

	$wp_customize->add_setting(
		'glacix_topbar_message',
		array(
			'default'           => __( 'Bacteriostatic Water. Pure. Clean. Quality.', 'glacix' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'glacix_topbar_message',
		array(
			'label'   => __( 'Top bar announcement', 'glacix' ),
			'section' => 'glacix_header',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'glacix_show_topbar',
		array(
			'default'           => true,
			'sanitize_callback' => 'rest_sanitize_boolean',
		)
	);
	$wp_customize->add_control(
		'glacix_show_topbar',
		array(
			'label'   => __( 'Show top announcement bar', 'glacix' ),
			'section' => 'glacix_header',
			'type'    => 'checkbox',
		)
	);

	// ---------------------------------------------------------------------
	// Section: Footer
	// ---------------------------------------------------------------------
	$wp_customize->add_section(
		'glacix_footer',
		array(
			'title'    => __( 'Glacix: Footer', 'glacix' ),
			'priority' => 32,
		)
	);

	$wp_customize->add_setting(
		'glacix_footer_tagline',
		array(
			'default'           => __( 'Bacteriostatic Water. Pure. Clean. Quality.', 'glacix' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'glacix_footer_tagline',
		array(
			'label'   => __( 'Footer tagline', 'glacix' ),
			'section' => 'glacix_footer',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'glacix_footer_legal',
		array(
			'default'           => __( 'For laboratory and research use. Not intended as a substitute for professional medical advice.', 'glacix' ),
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'glacix_footer_legal',
		array(
			'label'   => __( 'Legal disclaimer', 'glacix' ),
			'section' => 'glacix_footer',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'glacix_customize_register' );

/**
 * Output Customizer color overrides as CSS variables on <head>.
 *
 * Keeps brand controls instantly reflected on the front end without rebuilding
 * stylesheets.
 */
function glacix_customizer_css() {
	$accent = get_theme_mod( 'glacix_accent_color', '#a5f3fc' );
	$glow   = get_theme_mod( 'glacix_glow_color', '#7dd3fc' );
	?>
	<style id="glacix-customizer-vars">
		:root {
			--gx-color-frost: <?php echo esc_attr( $accent ); ?>;
			--gx-color-glacier: <?php echo esc_attr( $glow ); ?>;
		}
	</style>
	<?php
}
add_action( 'wp_head', 'glacix_customizer_css', 99 );
