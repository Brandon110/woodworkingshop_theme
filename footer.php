<?php 
/**
 * The footer for our theme
 * 
 * Displays all of footer section and everything after <div class="site-content">
 * 
 * @package woodworkingshop
 */
?>

<footer class='site-footer'>
    <?php 
    /**
     * woodworkingshop_footer
     * 
     * @hooked woodworkingshop_site_footer_content_open - 5
     * @hooked woodworkingshop_footer_widget_area - 10
     * @hooked woodworkingshop_social_menu - 15
     * @hooked woodworkingshop_copyright - 20
     * @hooked woodworkingshop_site_footer_content_close - 30
     */
    do_action( 'woodworkingshop_footer' ); 
    ?>
</footer>
 <?php wp_footer(); ?>
 </html>
 </body>