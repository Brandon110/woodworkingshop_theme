<?php 
/**
 * Template used for displaying all pages.
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * 
 * @package woodworkingshop
 */

get_header(); 
?>

<div class='site-content' id='content'>
    <main class='main-content' role='main'>
        <?php 
        if ( have_posts() ):
        
            the_post();
            
            get_template_part( 'template-parts/content', 'page' );

        endif; 
        ?>
    </main>
</div>

<?php get_footer(); ?>