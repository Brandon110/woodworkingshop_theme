<?php
/**
 * WoodWorkingShop template hooks
 * 
 * @package woodworkingshop
 */

/**
 * Site Header
 * 
 * @see woodworkingshop_site_header_wrap_open()
 * @see woodworkingshop_site_header_content_open()
 * @see woodworkingshop_site_identity()
 * @see woodworkingshop_primary_menu()
 * @see woodworkingshop_handheld_menu_toggle()
 * @see woodworkingshop_site_header_content_close()
 * @see woodworkingshop_handheld_menu()
 * @see woodworkingshop_site_header_wrap_close()
 */
add_action( 'woodworkingshop_header', 'woodworkingshop_site_header_wrap_open', 5 );
add_action( 'woodworkingshop_header', 'woodworkingshop_site_header_content_open', 10 );
add_action( 'woodworkingshop_header', 'woodworkingshop_site_identity', 15 );
add_action( 'woodworkingshop_header', 'woodworkingshop_primary_menu', 20 );
add_action( 'woodworkingshop_header', 'woodworkingshop_handheld_menu_toggle', 30 );
add_action( 'woodworkingshop_header', 'woodworkingshop_site_header_content_close', 40 );
add_action( 'woodworkingshop_header', 'woodworkingshop_handheld_menu', 45 );
add_action( 'woodworkingshop_header', 'woodworkingshop_site_header_wrap_close', 50 );

/**
 * Before content
 * 
 * @see woodworkingshop_header_widget_area()
 */
add_action( 'woodworkingshop_before_content', 'woodworkingshop_header_widget_area', 10 );

/**
 * Footer widget area
 * 
 * @see woodworkingshop_footer_widget_area()
 */
add_action( 'woodworkingshop_footer_widgets', 'woodworkingshop_footer_widget_area', 5 );

/**
 * Pages
 * 
 * @see woodworkingshop_page_header()
 * @see woodworkingshop_page_content()
 */
add_action( 'woodworkingshop_page', 'woodworkingshop_page_header', 5 );
add_action( 'woodworkingshop_page', 'woodworkingshop_page_content', 10 );
add_action( 'woodworkingshop_search', 'woodworkingshop_search_content', 5 );

/**
 * Posts
 * 
 * @see woodworkingshop_post_header()
 * @see woodworkingshop_post_content()
 */
add_action( 'woodworkingshop_posts', 'woodworkingshop_post_header', 5 );
add_action( 'woodworkingshop_posts', 'woodworkingshop_post_content', 10 );

/**
 * Site footer
 * 
 * @see woodworkingshop_site_footer_content_open()
 * @see woodworkingshop_footer_widget_area()
 * @see woodworkingshop_social_menu()
 * @see woodworkingshop_copyright()
 * @see woodworkingshop_site_footer_content_close()
 */
add_action( 'woodworkingshop_footer', 'woodworkingshop_site_footer_content_open', 5 );
add_action( 'woodworkingshop_footer', 'woodworkingshop_footer_widget_area', 10 );
add_action( 'woodworkingshop_footer', 'woodworkingshop_social_menu', 15 );
add_action( 'woodworkingshop_footer', 'woodworkingshop_copyright', 20 );
add_action( 'woodworkingshop_footer', 'woodworkingshop_site_footer_content_close', 30 );