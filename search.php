<?php 
/**
 * Template used for displaying search results.
 *
 * @package woodworkingshop
 */

get_header(); 
?>

<main class='main-content' role='main' id='content'>
    <div class='site-content'>

            <?php 
            if ( have_posts() ) {

                while ( have_posts() ) {
 
                    the_post();

                    get_template_part( 'template-parts/content', 'excerpt' );

                }

                the_posts_pagination(
                    array(
                        'mid_size'  => 2,
                        'prev_text' => woodworkingshop_get_icon_svg( 'chevron-left' ),
                        'next_text' => woodworkingshop_get_icon_svg( 'chevron-right' ),
                    )
                );
            
            } else {
                
                get_template_part( 'template-parts/content', 'none' );
            
            }
            ?>

    </div>
</main>

<?php get_footer(); ?>