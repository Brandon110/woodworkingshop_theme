<?php
/**
 * WooCoommerce template functions
 * 
 * @package woodworkingshop
 */

/**
 * WooCommerce mini cart
 */
function woodworkingshop_mini_cart() {

    $count = WC()->cart->get_cart_subtotal();
    $cart_url = wc_get_cart_url();

    ?>
    <div class='mini-cart-wrap'>
        <a class='cart-contents' title="<?php _e( 'View your shopping cart' ) ?>">
        <?php echo woodworkingshop_get_icon_svg( 'cart' ); ?>
        <span class='cart-total'>Cart: <?php echo $count ?></span>
        </a>

        <div id='mini-cart-contents' class='mini-cart-contents'>
            <?php woocommerce_mini_cart(); ?>
        </div>
    </div>
    <?php
} 

/**
 * Update cart total
 */
function woodworkingshop_update_cart_total( $fragments ) {
    ob_start();

    $count = WC()->cart->get_cart_subtotal();
    $cart_url = wc_get_cart_url();

    ?>
    <a class='cart-contents' title="<?php _e( 'View your shopping cart' ) ?>">
    <?php echo woodworkingshop_get_icon_svg( 'cart' ); ?>
    <span class='cart-total'>Cart: <?php echo $count ?></span>
    </a>
    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}

/**
 * Update mini cart
 */
function woodworkingshop_update_mini_cart( $fragments ) {
    ob_start();

    ?>
    <div id='mini-cart-contents' class='mini-cart-contents'>
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php

    $fragments['div.mini-cart-contents'] = ob_get_clean();

    return $fragments;
}

/**
 * Shop products wrap open
 * 
 */
function woodworkingshop_shop_products_wrap_open() {
    ?>
    <div class='shop-products-wrap' id='shop'>
    <?php
}

/**
 * Shop products wrap close
 * 
 */
function woodworkingshop_shop_products_wrap_close() {
    ?>
    </div>
    <?php
}


/**
 * Shop page featured image
 * 
 */
function woodworkingshop_shop_featured_image() {
    $shopPageId = get_option( 'woocommerce_shop_page_id' );
    $featuredImg = get_the_post_thumbnail( $shopPageId );

    if ( ! has_post_thumbnail( $shopPageId ) ) :
        return;
    endif;

    if ( is_shop() ) :
        ?>
        <figure class='post-thumbnail' id='shop-thumbnail'>
            <?php echo $featuredImg; ?>
            <?php if ( apply_filters( 'show_tagline_in_shop_thumbnail', true ) ) : ?>
            <figcaption class='site-description'>
                <?php echo bloginfo( 'description' ); ?>
                <a class='view-shop-link' href='#shop'>
                View Shop
                </a>
            </figcaption>
            <?php endif; ?>
        </figure>
        <?php
    endif;
}

/**
 * Show a shop page description on product archives.
 */
function woocommerce_product_archive_description() {
    // Don't display the description on search results page.
    if ( is_search() ) {
        return;
    }

    if ( is_post_type_archive( 'product' ) && in_array( absint( get_query_var( 'paged' ) ), array( 0, 1 ), true ) ) {
        $shop_page = get_post( wc_get_page_id( 'shop' ) );
        if ( $shop_page ) {
            $description = wc_format_content( $shop_page->post_content );
            if ( $description ) {
                echo $description; // WPCS: XSS ok.
            }
        }
    }
}