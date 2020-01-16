<?php
/**
 * WoodWorkingShop template functions
 * 
 * @package woodworkingshop
 */

if ( ! function_exists( 'woodworkingshop_site_header_wrap_open' ) ) :
    /**
     * Site header wrap
     * 
     */
    function woodworkingshop_site_header_wrap_open() {
        ?>
        <div class='site-header'>  
        <?php
    } 
endif;

if ( ! function_exists( 'woodworkingshop_site_header_wrap_close' ) ) : 
    /**
     * Site header wrap close
     * 
     */
    function woodworkingshop_site_header_wrap_close() {
        ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_site_header_content_open' ) ) :
    /**
     * Site header content open
     * 
     */
    function woodworkingshop_site_header_content_open() {
        ?>
        <div class='site-header-content'>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_site_header_content_close' ) ) :
    /**
     * Site header content close
     * 
     */
    function woodworkingshop_site_header_content_close() {
        ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_site_identity' ) ) :
    /**
     * Site identity
     * 
     */
    function woodworkingshop_site_identity() {
        ?>
        <div class='site-branding'>
            <?php if ( ! get_theme_mod( 'wws_logo_url' ) ) : ?>
            <h1 class='site-title'>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            </h1>
            <?php if ( get_theme_mod( 'wws_tagline_display' ) ) : ?>
            <p class='site-description'><?php bloginfo( 'description' ); ?></p>
            <?php endif; ?>
            <?php else: ?>
            <h1 class='site-logo'>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo esc_url( get_theme_mod( 'wws_logo_url' ) ); ?>" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>">
                </a>
            </h1>
            <?php endif; ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_primary_menu' ) ) :
    /**
     * Primary menu
     * 
     */
    function woodworkingshop_primary_menu() {
        ?>
        <nav class='primary-menu'>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary-menu',
                    'container' => false,
                    'depth' => 5,
                )
            );
            ?>
        </nav>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_handheld_menu_toggle' ) ):
    /**
     * Handheld menu toggle
     * 
     */
    function woodworkingshop_handheld_menu_toggle() {
        ?>
        <a role='button' id='toggle-handheld-menu' class='handheld-menu-toggle'>
        <?php echo woodworkingshop_get_icon_svg( 'menu' ); ?>
        </a>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_handheld_menu' ) ) : 
    /**
     * Handheld menu
     * 
     */
    function woodworkingshop_handheld_menu() {
        ?>
        <nav class='handheld-menu' id='handheld-menu-items'>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'handheld-menu',
                    'container' => false,
                    'depth' => 5,
                )
            );
            ?>
        </nav>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_site_content_open' ) ) :
    /**
     * Site content open
     * 
     */
    function woodworkingshop_page_content_open() {
        ?>
        <div class='site-content' id='content'>
            <main class='main-content' role='main'>
                <div class='page-content'>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_site_content_close' ) ) :
    /**
     * Site content close
     * 
     */
    function woodworkingshop_page_content_close() {
        ?>
        </div>
        </main>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_page_header' ) ) :
    /**
     * Page header
     * 
     */
    function woodworkingshop_page_header() {
        woodworkingshop_post_thumbnail()
        ?>
        <header class='entry-header'>
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_page_content' ) ) :
    /**
     * Page content
     * 
     */
    function woodworkingshop_page_content() {
        ?>
        <div class='entry-content'>
            <?php 
            the_content(); 

            woodworkingshop_link_pages();
            ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_container_open' ) ) : 
    /**
     * Container open
     * 
     */
    function woodworkingshop_container_open() {
        ?>
        <div class='container'>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_container_close' ) ) : 
    /**
     * Container open
     * 
     */
    function woodworkingshop_container_close() {
        ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_search_form' ) ) : 
    /**
     * Search form
     * 
     */
    function woodworkingshop_search_form() {
        if ( woodworkingshop_is_woocommerce_activated() ) {
            get_product_search_form();
        }
        else {
            get_search_form();
        }
    }
endif;

if ( ! function_exists( 'woodworkingshop_header_widget_area' ) ) : 
    /**
     * Header widget area
     * 
     */
    function woodworkingshop_header_widget_area() {
        if ( is_active_sidebar( 'header-area' ) ) :
            dynamic_sidebar( 'header-area' ); 
        endif;
    }
endif;

if ( ! function_exists( 'woodworkingshop_footer_widget_area' ) ) : 
    /**
     * Footer widget area
     * 
     */
    function woodworkingshop_footer_widget_area() {
        if ( is_active_sidebar( 'footer-area' ) ) :
            dynamic_sidebar( 'footer-area' );
        endif;
    }
endif;

if ( ! function_exists( 'woodworkingshop_search_content' ) ):
    /**
     * Search content
     */
    function woodworkingshop_search_content() {
        ?>
        <div class='search-item'>
            <div class='entry-content'>
                <?php 
                woodworkingshop_post_thumbnail();
                the_title( sprintf( '<h2><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>');
                the_content(); 
                ?>
            </div>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_post_header' ) ):

    /**
     * Post header
     */
    function woodworkingshop_post_header() {
        ?>
        <header class='entry-header'>
            <?php
            if ( is_single() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
            }
            ?>
        </header>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_post_content' ) ):
    /**
     * Post content
     */
    function woodworkingshop_post_content() {

        woodworkingshop_post_thumbnail();
        ?>
        <div class='entry-content'>
        <?php   
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'woodworkingshop' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
        );

        woodworkingshop_link_pages();
        ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_site_footer_content_open' ) ) :
    /**
     * Footer content open
     * 
     */
    function woodworkingshop_site_footer_content_open() {
        ?>
        <div class='site-footer-content'>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_site_footer_content_close' ) ) :
    /**
     * Footer content close
     * 
     */
    function woodworkingshop_site_footer_content_close() {
        ?>
        </div>
        <?php
    }
endif;

if ( ! function_exists( 'woodworkingshop_social_menu' ) ) : 
    /**
     * Social menu
     */
    function woodworkingshop_social_menu() {
        if ( has_nav_menu( 'social-menu' ) ) :
            ?>
            <nav class='social-menu'>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'social-menu',
                        'container' => false,
                        'link_before'    => '<span class="screen-reader-text">',
                        'link_after'     => '</span>' . woodworkingshop_get_icon_svg( 'link' ),
                        'depth' => 1,
                    )
                );
                ?>
            </nav>
            <?php
        endif;
    }
endif;

if ( ! function_exists( 'woodworkingshop_copyright' ) ) :
    /**
     * Copyright
     */
    function woodworkingshop_copyright() {
        ?>
        <div class='copyright'>&copy; Copyright <span><?php bloginfo( 'name' ); ?></span> <?php echo Date( 'Y' ); ?> </div>
        <?php
    }
endif;