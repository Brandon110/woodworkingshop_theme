<?php
/**
 * SVG icon related functions
 * 
 * @package woodworkingshop
 */

/**
 * Gets the SVG code for a given icon.
 */
function woodworkingshop_get_icon_svg( $icon, $size = 24 ) {
	return WoodWorkingShop_SVG_Icons::get_svg( 'ui', $icon, $size );
}

/**
 * Gets the SVG code for a given social icon.
 */
function woodworkingshop_get_social_icon_svg( $icon, $size = 24 ) {
	return WoodWorkingShop_SVG_Icons::get_svg( 'social', $icon, $size );
}

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 */
function woodworkingshop_get_social_link_svg( $uri, $size = 24 ) {
	return WoodWorkingShop_SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Display SVG icons in social links menu.
 *
 */
function woodworkingshop_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
 
	if ( 'social-menu' === $args->theme_location ) {
		$svg = woodworkingshop_get_social_link_svg( $item->url, 26 );
		if ( empty( $svg ) ) {
			$svg = woodworkingshop_get_icon_svg( 'link' );
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'woodworkingshop_nav_menu_social_icons', 10, 4 );