<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package portail_service_educatif
 */

/** 
*   INIT VARIABLES 
*************************/
$themes = get_the_terms( $post->ID, 'thematique');              // recup les terms de la custom taxonomy "thematique"
$typeressources = get_the_terms( $post->ID, 'typeressource');   // recup les terms de la custom taxonomy "typeressource"
$niveaux = get_the_terms( $post->ID, 'niveau');                 // recup les terms de la custom taxonomy "niveau"
$motsCles = get_the_terms( $post->ID, 'motcle');                 // recup les terms de la custom taxonomy "motcle" (mots clés libres)

// ajout des mots clés dans le tableau $relatedPage pour argument wp_query des documents associés
if( $motsCles ){
    $relatedPage=array();
    foreach( $motsCles as $motcle ) 
    {
        array_push($relatedPage, $motcle->slug);
    }
} 
     
?>

<article data-theme="<?php echo $themes[0]->slug; ?>">
    <header>
        <section role="metaTags">
        <?php
        if( $themes ) {
            ?>
            <div>
                <?php
                foreach( $themes as $theme ){ ?>
                <a href="<?php echo get_term_link( $theme ); ?>" title="Voir toutes les documents de cette thématique">
                    <svg class="<?php echo $theme->slug."Bg";?>">
                      <use xlink:href="#<?php echo $theme->slug; ?>"/>
                    </svg>
                    <span><?php echo $theme->name; ?></span>
                </a>
                <?php } ?>
            </div>
        <?php  } ?>
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
        <figure>
        <?php 
        if (get_the_post_thumbnail()) {
        ?>
        <?php the_post_thumbnail( 'illustration-article' ); ?>
        <?php 
        }else {
        ?>
        <img src="<?php bloginfo( 'template_url' );echo "/images/".term_defaultImg($themes[0]->slug)."";?>" alt="">
        <?php
        }
        ?>
        </figure>
        

    </header>
    <section>
        <?php the_content();?>
        <section role="related">
           <h3>Documents associés</h3>
           <?php
            /*******  WP_QUERY
            * Liste des pages associés aux mots clés libres
            */    

            // WP_Query arguments

            $argsRelatedListPages = array (
                'post_type'             => array( 'page' ),
                'post_status'           => array( 'publish' ),
                'posts_per_page'        => -1,                  //liste sans limite
                'post__not_in'          => array($post->ID),    //exclu le post courant
                'tax_query'             => array(
                                                array(
                                                    'taxonomy' => 'motcle',
                                                    'field'    => 'slug',
                                                    'terms'    => $relatedPage,
                                                ),
                                            ),
            );
            related_list_pages($argsRelatedListPages);

        ?>
    </section>
    </section>

    <div>
        <aside>

            <nav role="sommaire">
                <h2>Sommaire</h2>
            </nav>
            <?php
                if( $motsCles ){
            ?>
            <section>
               <h2>Mots clés</h2>
                <?php 
                    foreach( $motsCles as $motcle ): ?>
                    <a href="<?php echo get_term_link( $motcle ); ?>" title="Voir toutes les documents de cette catégorie" class="tag"><span class="icon-tag"></span> <?php echo $motcle->name; ?></a>
                <?php 
                    endforeach; 
                ?>
            </section>
            <?php
                } 
            ?>                    
        </aside>
    </div>
    <footer>
    </footer>
</article>
