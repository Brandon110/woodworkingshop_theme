<?php
/**
 * WooCommerce functions
 * 
 * @package woodworkingshop
 */

/**
 * Sets up theme defaults and registers support for various WooCommerce features.
 */ 
function woodworkingshop_woocommerce_setup() {

    //Add gallery zoom
    add_theme_support( 'wc-product-gallery-zoom' );

    //Add gallery lightbox
    add_theme_support( 'wc-product-gallery-lightbox' );

    //Add gallery slider
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'woodworkingshop_woocommerce_setup' );

/**
 * Enqueues WooCommerce scripts and styles.
 */
function woodworkingshop_woocommerce_scripts() {

    //Add Woodworkingshop WooCommerce styles
    wp_enqueue_style( 'woodworkingshop-woocommerce-styles', get_theme_file_uri( 'woocommerce.css' ), 
    array(), 1, 'all' );

    //Add our woocommerce scripts
    wp_enqueue_script( 'woodworkingshop-woocommerce-js', get_theme_file_uri( '/assets/js/woocommerce.js' ), 
    '', 1, true );
}
add_action( 'wp_enqueue_scripts', 'woodworkingshop_woocommerce_scripts' );

/**
 * Filter text
 * Change No products in cart message for WooCommerce mini cart
 */
function woodworkingshop_change_no_products_in_cart_msg( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {

        case 'No products in the cart.' :
        $translated_text = __( 'Your cart is empty!', 'woocommerce' );
        break;

        case 'Your cart is currently empty.' :
        $translated_text = __( 'Currently no items in your cart.' );
        break;

    }

    return $translated_text;
}
add_filter( 'gettext', 'woodworkingshop_change_no_products_in_cart_msg', 20, 3 );

/**
 * Change woocommerce breadcrumb defaults
 */
function woodworkingshop_woocommerce_breadcrumb_defaults( $defaults ) {
    $defaults['delimiter'] = "<span class='breadcrumb-seperator'>" . woodworkingshop_get_icon_svg( 'chevron-right' ) . "</span>";

    return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'woodworkingshop_woocommerce_breadcrumb_defaults' );

/**
 * Toggle shop title
 */
function woodworkingshop_toggle_shop_title() {
    return false;
}

/**
 * Output the quantity input for add to cart forms
 */
function woocommerce_quantity_input( $args = array(), $product = null, $echo = true ) {
    if ( is_null( $product ) ) {
        $product = $GLOBALS['product'];
    }

    $defaults = array(
        'input_id'     => uniqid( 'quantity_' ),
        'input_name'   => 'quantity',
        'input_value'  => '1',
        'classes'      => apply_filters( 'woocommerce_quantity_input_classes', array( 'input-text', 'qty', 'text' ), $product ),
        'max_value'    => apply_filters( 'woocommerce_quantity_input_max', -1, $product ),
        'min_value'    => apply_filters( 'woocommerce_quantity_input_min', 0, $product ),
        'step'         => apply_filters( 'woocommerce_quantity_input_step', 1, $product ),
        'pattern'      => apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' ),
        'inputmode'    => apply_filters( 'woocommerce_quantity_input_inputmode', has_filter( 'woocommerce_stock_amount', 'intval' ) ? 'numeric' : '' ),
        'product_name' => $product ? $product->get_title() : '',
    );

    $args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );

    // Apply sanity to min/max args - min cannot be lower than 0.
    $args['min_value'] = max( $args['min_value'], 0 );
    $args['max_value'] = 0 < $args['max_value'] ? $args['max_value'] : '';

    // Max cannot be lower than min if defined.
    if ( '' !== $args['max_value'] && $args['max_value'] < $args['min_value'] ) {
        $args['max_value'] = $args['min_value'];
    }

    ob_start();

    wc_get_template( 'template-parts/woocommerce/quantity-input.php', $args );
    
    if ( $echo ) {
        echo ob_get_clean(); // WPCS: XSS ok.
    } else {
        return ob_get_clean();
    }
}
 
/**
 * Checks and validates quantity
 * 
 */
function woodworkingshop_minimum_item_quantity_validation( $passed, $product_id, $quantity ) {
 
	global $woocommerce;
  
	if ( $quantity < 1 || ! is_numeric($quantity) ) {
        $passed = false;
 
		wc_add_notice( sprintf( __( "Incorrect format for quantity", "woodworkingshop" ) ), 'error' );
    }
    else {
        $passed = true;
    } 
    
    return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'woodworkingshop_minimum_item_quantity_validation', 10, 5 );

/**
 * Change flexslider options
 * 
 */
function woodworkingshop_woocommerce_flexslider_options( $options ) {

    $options['directionNav'] = true;
    $options['controlNav'] = true;

    return $options;
}
add_filter( 'woocommerce_single_product_carousel_options', 'woodworkingshop_woocommerce_flexslider_options' );

/**
 * Change pagination args for woocommerce
 * 
 */
function woodworkingshop_woocommerce_pagination_args( $args ) {

    $args['prev_text'] = woodworkingshop_get_icon_svg( 'chevron-left' );
    $args['next_text'] = woodworkingshop_get_icon_svg( 'chevron-right' );

    return $args;
}
add_filter( 'woocommerce_pagination_args', 'woodworkingshop_woocommerce_pagination_args' );

/**
 * Change stock message
 * 
 */
function woodworkingshop_change_stock_message( $message, $stock_status ) {
    if ( $stock_status == "Out of stock" ) {
        $message = '<p class="stock out-of-stock">Sold</p>';    
    } else {
        $message = '<p class="stock in-stock">Available</p>';           
    }
    return $message;
}
add_filter( 'woocommerce_stock_html', 'woodworkingshop_change_stock_message', 10, 2 );

/**
 * Customize woocommerce product search form
 */
function woodworkingshop_woocommerce_custom_product_searchform( $form ) {
	
	$form = '<form class="search-form" role="search" method="get" action="' . esc_url( home_url( '/'  ) ) . '">
			<label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
            <div class="search-wrap">
            <input type="text" value="' . get_search_query() . '" name="s" class="search" placeholder="' . __( 'Search products...', 'woocommerce' ) . '" />
			<button class="search-form-btn" type="submit">' . woodworkingshop_get_icon_svg( 'search' ) . '</button>
            </div>
            <input type="hidden" name="post_type" value="product" />
            </form>';
	
	return $form;
	
}
add_filter( 'get_product_search_form' , 'woodworkingshop_woocommerce_custom_product_searchform' );