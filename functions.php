<?php 
/**
 * Template functions
 * 
 * @package woodworkingshop
 */

/**
 * woodworkingshop functions
 * 
 */
require 'inc/woodworkingshop-functions.php'; 

/**
 * Include our customizer settings
 * 
 */
require 'inc/class-woodworkingshop-customizer.php';

/**
 * WooCommerce template functions
 * 
 * Only initialize these functions if WooCommerce is active
 */
if ( woodworkingshop_is_woocommerce_activated() ) {

    require 'inc/woocommerce/woodworkingshop-woocommerce-functions.php';

    require 'inc/woocommerce/woodworkingshop-woocommerce-template-hooks.php';

    require 'inc/woocommerce/woodworkingshop-woocommerce-template-functions.php';
}

/**
 * Template tags
 */
require 'inc/woodworkingshop-template-tags.php';

/**
 * SVG icon class
 */
require 'inc/class-woodworkingshop-svg-icons.php';

/**
 * SVG icon related functions
 */
require 'inc/woodworkingshop-icon-functions.php';

/**
 * woodworkingshop template hooks
 */
require 'inc/woodworkingshop-template-hooks.php';

/**
 * woodworkingshop template functions
 */
require 'inc/woodworkingshop-template-functions.php';