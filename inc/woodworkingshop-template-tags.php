<?php
/**
 * WoodWorkingShop template tags.
 * 
 * @package woodworkingshop
 */

/**
 * Post thumbnail
 */
function woodworkingshop_post_thumbnail() {
    if ( ! has_post_thumbnail() ) :
        return;
    endif;

    if ( is_singular() ) :
        ?>
        <figure class='post-thumbnail'>
        <?php the_post_thumbnail(); ?>
        </figure>
        <?php
    else:
        ?>
        <figure class='post-thumbnail'>
            <a href="<?php esc_url( the_permalink() ); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        </figure>
        <?php
    endif;
}

/**
 * Link pages
 */
function woodworkingshop_link_pages() {
    wp_link_pages( 
        array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'woodworkingshop' ),
            'after'  => '</div>',
        ) 
    );
}