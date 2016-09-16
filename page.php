<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portail_service_educatif
 */

get_header(); 

?>

<div class="wrapper-container">
    <main id="main" class="full" role="main">
    <?php
        while ( have_posts() ) {
            the_post(); 
   
            edit_post_link(
                sprintf(
                    /* translators: %s: Name of current post */
                    esc_html__( '%s', 'portal-serviceedu' ),
                    the_title( '<span class=" dashicons dashicons-welcome-write-blog"></span> <span class="screen-reader-text">"', '"</span>', false )
                ),
                '<div class="tag" role="edit-page">',
                '</div>'
            );

            get_template_part( 'template-parts/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        
        } // End of the loop.
        ?>

        

    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
?>