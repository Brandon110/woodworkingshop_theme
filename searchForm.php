<?php 
/**
 * Used to display template search form
 * 
 * @package woodworkingshop
 */
?>
<form class="search-form" role="search" method="get" action="<?php esc_url( home_url( '/'  ) ) ?>">
    <label class="screen-reader-text" for="s"><?php esc_html_e( 'Search for:', 'woodworkingshop' ); ?></label>
    <div class="search-wrap">
        <input type="text" value="<?php get_search_query(); ?>" name="s" class="search" placeholder="<?php esc_html_e( 'Search...', 'woodworkingshop' ); ?>" />
        <button class="search-form-btn" type="submit"><?php echo woodworkingshop_get_icon_svg( 'search' ); ?></button>
    </div>
</form>