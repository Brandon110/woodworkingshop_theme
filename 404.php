<?php 
/**
 * Template for displaying page not found.
 * 
 * @package woodworkingshop
 */

get_header(); 
?>

<div class='site-content' id='content'>
    <main class='main-content' role='main'>

        <div class='container'>
            <h1 class='entry-title'><?php esc_html_e( 'Oops! Page not found', 'woodworkingshop' ); ?></h1>

            <p><?php esc_html_e( 'The page you are trying to view is either temporary unavailable or doesn\'t exist. Try searching below.', 'woodworkingshop' ); ?></p>

            <div class='404-search-form-wrap'>
                <?php  
                if ( woodworkingshop_is_woocommerce_activated() ) {
                    the_widget( 'WC_Widget_Product_Search' ); 
                }
                else {
                    get_search_form();
                }
                ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>