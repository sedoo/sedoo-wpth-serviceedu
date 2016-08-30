<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portail_service_educatif
 */

get_header(); 

?>

<div class="wrapper-container">
  <main id="main" class="embed" role="main">  
    <h1 class="<?php echo "$term"; ?>Border <?php echo "$term"; ?>Txt">
     <?php
         if (is_tax('thematique', $term)) {
        ?>

       <svg class="">
          <use xlink:href="#<?php echo "$term"; ?>"/>
        </svg>
        <span><?php echo term_name($term);?></span>
        <?php
        }else{
             echo term_name($term);
         }
    ?>
    </h1>
    
    <?php
  // Appel du module de listing des terms pour la taxonomie nommée
      
  if (is_tax('thematique', $term)) {
      $argsTerms = array(
                'taxonomy'  => 'typeressource',
                'order'    => 'ASC',
                'hide_empty' => 0
            );
    taxonomies_secondFilter_list(thematique, $term, typeressource, $argsTerms);
  }
  if (is_tax('typeressource', $term)) {
    $argsTerms = array(
                'taxonomy'  => 'thematique',
                'order'    => 'ASC',
                'hide_empty' => 1
            );
    taxonomies_secondFilter_list(typeressource, $term, thematique, $argsTerms);
  }
  if (is_tax('niveau', $term)) {
    $argsTerms = array(
                'taxonomy'  => 'thematique',
                'order'    => 'ASC',
                'hide_empty' => 0
            );
    taxonomies_secondFilter_list(niveau, $term, thematique, $argsTerms);
 }      
    
    ?>
    <div id="i-scroll">

    <?php

    // Requete différente si le 2eme niveau de filtre est chargé
    if ($_GET['second_filter']) {
        // WP_Query arguments

        // exclusions
        // recup options de "Custom Settings" dans backoffice
        $exclude_idsListPages=explode(",", get_option('idPageExcluded'));

        $argsListPages = array (
            'post_type'             => array( 'page' ),
            'post_status'           => array( 'publish' ),
            'orderby'               => 'ASC',   
            'posts_per_page'        => 6,
            'post__not_in'          => $exclude_idsListPages,
            'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => get_query_var( 'taxonomy' ),
                                    'field'    => 'slug',
                                    'terms'    => $term ,
                                ),
                                array(
                                    'taxonomy' => $_GET['taxonomy_name'],
                                    'field'    => 'slug',
                                    'terms'    => $_GET['term'],
                                ),
                            ),
        );

        list_pages($argsListPages);
    }
    else {
        
        if ( have_posts() ) : ?>
            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();

                $typeressources = get_the_terms( $post->ID, 'typeressource'); 
                $niveaux = get_the_terms( $post->ID, 'niveau');

                if( $typeressources ): 
                    $dataFormat="";
                    $output_typeressource="";
                    foreach( $typeressources as $typeressource ): 
                        $dataFormat.="".$typeressource->slug." ";
                        $output_typeressource.="<p><span class=\"icon-".$typeressource->slug."\"></span> ".$typeressource->name."</p>\n";
                    endforeach; 
                endif; 
            ?>
                <article data-format="<?php echo $dataFormat;?>">
                    <header>
                        <?php echo $output_typeressource;?>
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
                       <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="tag"><span class="icon-angle-right"></span> Lire la suite</a>
                    </section>

                </article>

        <?php	
            endwhile;
        ?>
            <figure style="display:none" class="loader">
                <img src="<?php bloginfo('template_directory');?>/images/loader.gif" alt="">
            </figure>

        </div>    
        <?php
        the_posts_navigation(array(
                'prev_text' => __( 'Page précédente', 'textdomain' ),
                'next_text' => __( 'Page suivante', 'textdomain' ),
                'screen_reader_text' => 'Plus de fiches'
            ));

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; 
      
    }?>

    </main>
</div>



<?php
//get_sidebar();
get_footer();?>