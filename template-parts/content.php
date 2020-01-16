<?php 
/**
 * Template used to display post content.
 * 
 * @package woodworkingshop
 */
?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    /**
     * woodworkingshop_posts
     * 
     * @hooked woodworkingshop_post_header - 5
     * @hooked woodworkingshop_post_content - 10
     */

    do_action( 'woodworkingshop_posts' ); 
    ?>

</article>