 <?php
/*
Template Name: Homepage
*/
get_header(); 


?>

<div class="wrapper-container">
    
    <main id="main" class="homepage" role="main">
       <div>
        <?php
//        if ( is_home() | is_front_page() ) : 
        ?>
<!--
				<header>
					<h1>Homepage</h1>
				</header>
-->
        <?php
//        endif;
        ?>
            <section>
                <?php
            if ( have_posts() ) :
                /* Start the Loop */
                while ( have_posts() ) : the_post();
            ?>
            <?php the_content(); ?>       

            <?php
                endwhile;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif; ?>
            </section>
            <section>
                <h2>News</h2>
               <?php
                /*******  WP_QUERY
                * Liste des derniers articles (actus)
                */

                $argsListPost = array (
                    'post_type'             => array( 'post' ),
                    'post_status'           => array( 'publish' ),
                    'order'                 => 'DESC'
                );
                
                list_pages($argsListPost);
                ?>
            </section>
            <section class="twoColumns">
                <h2>Outils "faits maison"</h2>
               <?php
                /*******  WP_QUERY
                * Liste de pages au hazard, avec exclusion des pages d'information (custom settings dans Menu admin)
                */
                // exclusions
                // recup options de "Custom Settings" dans backoffice
                $include_idsListPagesOutil=explode(",", get_option('idPageOutil'));

                $argsListPagesOutil = array (
                    'post_type'             => array( 'page' ),
                    'post_status'           => array( 'publish' ),
                    'orderby'               => 'title',
                    'order'                 => 'DESC',
                    'post__in'              => $include_idsListPagesOutil
                );
                
                list_pages($argsListPagesOutil);
                ?>
            </section>
            <section class="twoColumns">
                <h2>6 ressources au hazard...</h2>
              <?php
                /*******  WP_QUERY
                * Liste de pages au hazard, avec exclusion des pages d'information (custom settings dans Menu admin)
                */    

                // WP_Query arguments

                // exclusions
                // recup options de "Custom Settings" dans backoffice
                $exclude_idsListPages=explode(",", get_option('idPageExcluded'));

                $argsListPages = array (
                    'post_type'             => array( 'page' ),
                    'post_status'           => array( 'publish' ),
                    'orderby'               => 'rand',   
                    'posts_per_page'        => 6,
                    'post__not_in'          => $exclude_idsListPages
                );
                
                list_pages($argsListPages);
                ?>
            </section>
            
        </div>
        <aside>
            <section>
               <h2 class="typeRessouces">Types de ressources</h2>
               <?php
              // Appel du module de listing des terms pour la taxonomie nommée
                $argsTerms = array(
                    'taxonomy'  => 'typeressource',
                    'order'    => 'ASC',
                    'hide_empty' => 0
                );
                taxonomies_list(typeressource, $argsTerms);
                ?>
                <h2 class="niveaux">Niveaux</h2>
               <?php
              // Appel du module de listing des terms pour la taxonomie nommée
                //taxonomies_list(niveau);
                
                $argsTerms = array(
                        'taxonomy'   => 'niveau',
                        'orderby'    => 'slug',
                        'order'      => 'ASC',
                        'hide_empty' => 0
                    );
                taxonomies_list(niveau, $argsTerms);
                ?>
            </section>
            <section>
               <h2>Informations</h2>
               <?php include('side-nav.php');?>          

            </section>
            
            
       </aside>
        


    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
?>