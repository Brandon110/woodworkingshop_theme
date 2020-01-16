<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="site-content">
 *
 * @package woodworkingshop
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="format-detection" content="telephone=no"/>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class='site-header' role='banner'>
    <?php
    /**
     * woodworkingshop_header
     * 
     * @hooked woodworkingshop_site_header_wrap_open - 5
     * @hooked woodworkingshop_site_header_content_open - 10
     * @hooked woodworkingshop_site_identity - 15
     * @hooked woodworkingshop_primary_menu - 20
     * @hooked woodworkingshop_mini_cart - 25
     * @hooked woodworkingshop_handheld_menu_toggle - 30
     * @hooked woodworkingshop_site_header_content_close - 40
     * @hooked woodworkingshop_handheld_menu - 45
     * @hooked woodworkingshop_site_header_wrap_close - 50
     */
    do_action( 'woodworkingshop_header' );
    ?>
</header>

<div class='container'>
    <?php
    /**
     * woodworkingshop_before_content
     * 
     * @hooked woocommerce_breadcrumb - 5
     * @hooked woodworkingshop_header_widget_area - 10
     */
    do_action( 'woodworkingshop_before_content' );
    ?>
</div>