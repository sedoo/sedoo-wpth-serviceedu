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

/** 
*   INIT VARIABLES 
*************************/
$themes = get_the_terms( $post->ID, 'thematique');              // recup les terms de la custom taxonomy "thematique"
$typeressources = get_the_terms( $post->ID, 'typeressource');   // recup les terms de la custom taxonomy "typeressource"
$niveaux = get_the_terms( $post->ID, 'niveau');                 // recup les terms de la custom taxonomy "niveau"
?>




<div class="wrapper-container">
    
    <main id="main" class="<?php echo $themes[0]->slug; ?>" role="main">
        <article>
                <header>
                    <section role="metaTags">
                    <?php
                    //while ( have_posts() ) : the_post(); 
                    if( $themes ): 
                        foreach( $themes as $theme ): ?>

                        <a href="<?php echo get_term_link( $theme ); ?>" title="Voir toutes les documents de cette thématique">
                            <svg class="">
                              <use xlink:href="#<?php echo $theme->slug; ?>"/>
                            </svg>
                            <span><?php echo $theme->name; ?></span>
                        </a>
                        <?php endforeach; 
                    endif; ?>
                        <div>
                            <p>
                            <?php
                            if( $typeressources ): 
                                foreach( $typeressources as $typeressource ): ?>

                                
                                <span class="icon-<?php echo $typeressource->slug; ?>"></span> <?php echo $typeressource->name; ?>
                                
                            <?php 
                                endforeach; 
                              endif; ?>

        <?php
        if( $niveaux ): 
            foreach( $niveaux as $niveau ): ?>

            <a href="<?php echo get_term_link( $niveau ); ?>" title="Voir toutes les documents de cette thématique">
                <span><?php echo $niveau->name; ?> / <?php echo $niveau->slug; ?></span>
            </a>
        <?php endforeach; 
          endif; ?>


        <?php
            get_template_part( 'template-parts/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        //endwhile; // End of the loop.
        ?>



    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
?>
<h1>Page.php</h1>