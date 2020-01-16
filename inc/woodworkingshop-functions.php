<?php
/**
 * WoodWorkingShop Functions.
 * 
 * @package woodworkingshop
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function woodworkingshop_setup() {

    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support( 'title-tag' );

    //Removes message 'Your theme is not compatible with WooCommerce'.
    add_theme_support( 'woocommerce' );

    //Add support for thumbnails
    add_theme_support( 'post-thumbnails' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    //Add support for alignwide and alignfull
    add_theme_support( 'align-wide' );

    //Endables custom styles for wordpress editors
    add_theme_support( 'editor-styles' );

    //Tells editor to use this css
    add_editor_style( 'style-editor.css' );

    //Remove top admin bar
    add_filter('show_admin_bar', '__return_false');

    //Register menus
    register_nav_menus( 
        array( 
            'primary-menu' => __( 'primary-menu', 'woodworkingshop' ), 
            'handheld-menu' => __( 'handheld-menu', 'woodworkingshop' ),
            'social-menu' => __( 'social-menu', 'woodworkingshop' ),
        ) 
    );

    //Custom backgrounds
    add_theme_support( 'custom-background' );
} 
add_action( 'after_setup_theme', 'woodworkingshop_setup' );
 
/**
 * Enqueues scripts and styles.
 * 
 * These must be kept in this specific order
 */
function woodworkingshop_scripts() {

    //Add theme styles.
    wp_enqueue_style( 'woodworkingshop-styles', get_stylesheet_uri(), array(), 1, 'all' );

    //Deregister Jquery
    wp_deregister_script( 'jquery' );

    //Require Jquery
    wp_enqueue_script( 'jquery', get_theme_file_uri( '/assets/third-party/js/jquery-3.4.1.min.js' ), 
    '', 1, true );

    //Require js for site header
    wp_enqueue_script( 'woodworkingshop-js', get_theme_file_uri( '/assets/js/main.js' ), 
    array(), 1, true );
}
add_action( 'wp_enqueue_scripts', 'woodworkingshop_scripts' );

/**
 * Registers sidebars
 * 
 */
function woodworkingshop_widgets_init() {

    //Register header widget location
    register_sidebar(array(
        'name' => 'Header Area',
        'id' => 'header-area',
        'description' => 'Widget location before main content',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

    //Register footer widget location
    register_sidebar(array(
        'name' => 'Footer Area',
        'id' => 'footer-area',
        'description' => 'Widget location after main content',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}
add_action( 'widgets_init', 'woodworkingshop_widgets_init' );

/**
 * Checks if WooCommerce is activated
 * 
 * We check if WooCommerce is activated by testing if "WooCommerce" class exists.
 */
function woodworkingshop_is_woocommerce_activated() {

    return class_exists( 'WooCommerce' ) ? true : false;
}

/**
 * Checks if image type for file uploads
 * 
 * Assures user can only upload an image
 */
function woodworkingshop_sanitize_image( $input ){
 
    $output = '';
 
    $filetype = wp_check_filetype( $input );
    $mime_type = $filetype['type'];
 
    if ( strpos( $mime_type, 'image' ) !== false ){
        $output = $input;
    }
 
    return $output;
}

/**
 * Adds more icon in title of menu items with children in primary menu
 */
function woodworkingshop_nav_menu_primary_menu( $items, $args ) {
 
    if ( 'primary-menu' === $args->theme_location ) {

        $parents = wp_list_pluck( $items, 'menu_item_parent' );

        foreach ( $items as $item ) {
            if ( in_array( $item->ID, $parents ) ) {
                $item->menu_item_parent == 0 ?
                $item->title .= ' ' . woodworkingshop_get_icon_svg( 'more-vertical' )
                :
                $item->title .= ' ' . woodworkingshop_get_icon_svg( 'more-horizontal' );

            }
        }
    }

    return $items;
}
add_filter( 'wp_nav_menu_objects', 'woodworkingshop_nav_menu_primary_menu', 10, 4 );