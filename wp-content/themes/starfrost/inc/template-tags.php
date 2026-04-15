<?php
/**
 * Reusable template tags for Starfrost.
 *
 * @package Starfrost
 * @since   1.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'starfrost_posted_on' ) ) :
	/**
	 * Print HTML with meta information for the current post-date/time.
	 */
	function starfrost_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		echo '<span class="sf-meta__date posted-on">' . $time_string . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'starfrost_posted_by' ) ) :
	/**
	 * Print HTML with meta information for the current author.
	 */
	function starfrost_posted_by() {
		printf(
			'<span class="sf-meta__author byline">%1$s <a class="url fn n" href="%2$s">%3$s</a></span>',
			esc_html_x( 'by', 'post author', 'starfrost' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'starfrost_entry_footer' ) ) :
	/**
	 * Print HTML with meta information for categories, tags and comments.
	 */
	function starfrost_entry_footer() {
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( ', ' );
			if ( $categories_list ) {
				/* translators: %s: list of categories. */
				printf( '<span class="sf-meta__cats cat-links">' . esc_html__( 'In %s', 'starfrost' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if ( ! function_exists( 'starfrost_post_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail wrapped in a link, except in single views.
	 */
	function starfrost_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) :
			?>
			<figure class="sf-post-thumbnail">
				<?php the_post_thumbnail( 'starfrost-hero', array( 'loading' => 'eager' ) ); ?>
			</figure>
			<?php
		else :
			?>
			<a class="sf-post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'starfrost-card',
					array(
						'alt' => the_title_attribute( array( 'echo' => false ) ),
					)
				);
				?>
			</a>
			<?php
		endif;
	}
endif;

if ( ! function_exists( 'starfrost_logo' ) ) :
	/**
	 * Output the site logo (custom logo or the wordmark fallback).
	 */
	function starfrost_logo() {
		if ( has_custom_logo() ) {
			the_custom_logo();
			return;
		}
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sf-wordmark" rel="home" aria-label="<?php bloginfo( 'name' ); ?>">
			<span class="sf-wordmark__mark" aria-hidden="true">
				<svg viewBox="0 0 32 32" width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
					<path d="M16 2 L16 30 M2 16 L30 16 M6 6 L26 26 M26 6 L6 26"></path>
					<circle cx="16" cy="16" r="4" fill="currentColor" stroke="none"></circle>
				</svg>
			</span>
			<span class="sf-wordmark__text">
				<?php bloginfo( 'name' ); ?>
			</span>
		</a>
		<?php
	}
endif;

if ( ! function_exists( 'starfrost_cart_link' ) ) :
	/**
	 * Output the header cart link with live count badge.
	 */
	function starfrost_cart_link() {
		if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
			return;
		}
		$count = WC()->cart->get_cart_contents_count();
		?>
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="sf-cart-link" data-sf-cart-toggle aria-label="<?php esc_attr_e( 'View cart', 'starfrost' ); ?>">
			<svg aria-hidden="true" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
				<path d="M6 7h12l-1.2 10.5a2 2 0 0 1-2 1.75H9.2a2 2 0 0 1-2-1.75L6 7Z"></path>
				<path d="M9 7V5a3 3 0 0 1 6 0v2"></path>
			</svg>
			<span class="sf-cart-link__count" data-sf-cart-count><?php echo esc_html( $count ); ?></span>
		</a>
		<?php
	}
endif;
