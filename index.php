<?php 
/**
 * The main template file
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * 
 * @package woodworkingshop
 */

get_header(); 
?>
<div class='site-content' id='content'>
    <main class='main-content' role='main'>
            <?php 
            if ( have_posts() ) {

                while ( have_posts() ) {
                    
                    the_post();
        
                    get_template_part( 'template-parts/content' );

                }

            } else {
                
                get_template_part( 'template-parts/content', 'none' );

            }
            ?>
    </main>
</div>

<?php get_footer(); ?>