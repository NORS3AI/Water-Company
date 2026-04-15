<?php
/**
 * Custom search form for Starfrost.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

$starfrost_search_id = 'sf-search-' . wp_unique_id();
?>
<form role="search" method="get" class="sf-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $starfrost_search_id ); ?>">
		<?php esc_html_e( 'Search for:', 'starfrost' ); ?>
	</label>
	<input
		type="search"
		id="<?php echo esc_attr( $starfrost_search_id ); ?>"
		class="sf-search-form__input"
		placeholder="<?php esc_attr_e( 'Search Starfrost…', 'starfrost' ); ?>"
		value="<?php echo esc_attr( get_search_query() ); ?>"
		name="s"
	/>
	<button type="submit" class="sf-search-form__submit">
		<span class="screen-reader-text"><?php esc_html_e( 'Search', 'starfrost' ); ?></span>
		<svg aria-hidden="true" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
			<circle cx="11" cy="11" r="7"></circle>
			<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
		</svg>
	</button>
</form>
