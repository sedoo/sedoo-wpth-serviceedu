<?php
/*
Template Name: Page d'information
*/
?>
<?php get_header(); ?>

<div class="wrapper-container">
    <main id="main" class="pageInfo" role="main">
        <?php include('side-nav.php');?>
        <?php
        while ( have_posts() ) : the_post(); 
        ?>
        <article>
            <header id="header">                
                <h1><?php the_title();?></h1>            
            </header>
            
            <section>
                <?php the_content();?>
            </section>
            <footer>
                <?php
                    edit_post_link(
                        sprintf(
                            /* translators: %s: Name of current post */
                            esc_html__( 'Edit %s', 'portal-serviceedu' ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                ?>
            </footer>
           <?php           
        endwhile; // End of the loop.
        ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
//get_sidebar();
get_footer();
?>