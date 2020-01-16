<?php 
/**
 * WooCommerce template hooks
 * 
 * @package woodworkingshop
 */

/**
 * Layout
 * 
 * @see woodworkingshop_site_content_open()
 * @see woodworkingshop_entry_content_open()
 * @see woodworkingshop_entry_content_close()
 * @see woodworkingshop_site_content_close()
 * @see oodworkingshop_container_open()
 * @see woodworkingshop_container_close()
 * 
 * @see woodworkingshop_toggle_shop_title()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end ', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
 
add_action( 'woocommerce_before_main_content', 'woodworkingshop_page_content_open', 5 );
add_action( 'woocommerce_before_main_content', 'woodworkingshop_shop_featured_image', 11 );
add_action( 'woocommerce_after_main_content', 'woodworkingshop_page_content_close', 15 );
add_action( 'woocommerce_before_shop_loop', 'woodworkingshop_shop_products_wrap_open', 5 );
add_action( 'woocommerce_after_shop_loop', 'woodworkingshop_shop_products_wrap_close', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 11 );

add_filter( 'woocommerce_show_page_title', 'woodworkingshop_toggle_shop_title' );

/**
 * Site Header
 * 
 * @see woodworkingshop_mini_cart()
 * 
 * @see woodworkingshop_update_cart_total()
 * @see woodworkingshop_update_mini_cart()
 */
add_action( 'woodworkingshop_header', 'woodworkingshop_mini_cart', 25 );

add_filter( 'woocommerce_add_to_cart_fragments', 'woodworkingshop_update_cart_total' );
add_filter( 'woocommerce_add_to_cart_fragments', 'woodworkingshop_update_mini_cart' );

/**
 * Before content
 * 
 */
add_action( 'woodworkingshop_before_content', 'woocommerce_breadcrumb', 5 );