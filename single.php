<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package portail_service_educatif
 */

get_header(); 

/** 
*   INIT VARIABLES 
*************************/
$themes = get_the_terms( $post->ID, 'thematique');              // recup les terms de la custom taxonomy "thematique"
?>

<div class="wrapper-container">
    <main id="main" class="site-main full" role="main">
        <article>
            <header>
                <section role="metaTags">
            <?php
            while ( have_posts() ) : the_post(); 
                if( $themes ): 
                    ?>
                    <div>
                        <?php
                        foreach( $themes as $theme ): ?>
                        <a href="<?php echo get_term_link( $theme ); ?>" title="Voir toutes les documents de cette thématique">
                            <svg class="">
                              <use xlink:href="#<?php echo $theme->slug; ?>"/>
                            </svg>
                            <span><?php echo $theme->name; ?></span>
                        </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                    <div>
                        
                        <?php
                        if( $typeressources ): 
                            foreach( $typeressources as $typeressource ): ?>
                            <p><span class="icon-<?php echo $typeressource->slug; ?>"></span> <?php echo $typeressource->name; ?></p>
                        <?php 
                            endforeach; 
                        endif; ?>
                    </div>
                </section>
                
                <h1><?php the_title();?>
                <?php
                if( $niveaux ): 
                    foreach( $niveaux as $niveau ): ?>
                        <small><?php echo $niveau->name; ?></small>
                <?php endforeach; 
                  endif; ?>
                </h1>
                <figure><?php the_post_thumbnail( 'illustration-article' ); ?></figure>
                
            </header>
            <section>
                <?php the_content();?>
            </section>
            <div>
              <?php
               get_sidebar();
                ?>
                
            </div>
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
           // get_template_part( 'template-parts/content', 'page' );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

        </article>   

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
