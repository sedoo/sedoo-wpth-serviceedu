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
    
    <main id="main" class="full" data-theme="<?php echo $themes[0]->slug; ?>" role="main">
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
                <aside>
                    
                    <nav role="sommaire">
                        <h2>Sommaire</h2>
                    </nav>
                    <h2>Aller plus loin</h2>
                    <section>
                        <h3>Mots clés</h3>
                        <a href="" class="tag"><span class="icon-tag"></span> Truc</a>
                        <a href="" class="tag"><span class="icon-tag"></span> Machin</a>
                        <a href="" class="tag"><span class="icon-tag"></span> Chose</a>
                    </section>
    <!--
                    <section>
                       <h3>Support(s)</h3>
                        <a href="" class="tag"><span class="icon-tag"></span> Document</a>
                        <a href="" class="tag"><span class="icon-tag"></span> Video</a>
                        <a href="" class="tag"><span class="icon-tag"></span> Article</a>
                    </section>
    -->
                    <section>
                        <h3>Documents associés</h3>
                        <a href="#" class="tag"><span class="icon-fiche"></span> Fiche machin</a>
                        <a href="#" class="tag"><span class="icon-activite"></span> Activité machin</a>
                        <a href="#" class="tag"><span class="icon-activite"></span> Activité machin 2</a>
                        <a href="#" class="tag"><span class="icon-picture"></span> Diaporama truc</a>
                    </section>
                </aside>
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
//get_sidebar();
get_footer();
?>