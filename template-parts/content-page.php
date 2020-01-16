<?php
/**
 * Template used to display page content in page.php
 * 
 * @package woodworkingshop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
    /**
     * woodworkingshop_page
     * 
     * @hooked woodworkingshop_page_header - 5
     * @hooked woodworkingshop_page_content - 10
     */
    do_action( 'woodworkingshop_page' );
    ?>
</article>