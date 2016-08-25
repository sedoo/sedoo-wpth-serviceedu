 <?php
/*
Template Name: Homepage
*/
get_header(); 

$thematiques=array(
    "aero" => "Atmosphère",
    "astro" => "Astronomie",
    "biosphere" => "Biosphère",
    "ecologie" => "Ecologie",
    "geosciences" => "Géosciences",
    "oceano" => "Océanographie",
    "planeto" => "Planétologie"
);

if (is_tax('thematique', $term)) {
  $title = $thematiques[$term];
 }
?>

<div class="wrapper-container">
    
    <main id="main" class="homepage" role="main">
       
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

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
       
       <?php
            /*******  TEST QUERY
            **
            */
            
            // WP_Query arguments
            $args = array (
                'post_type'              => array( 'page' ),
                'post_status'            => array( 'publish' ),
                'orderby'                => 'rand',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                ?>
                <article data-format="<?php echo $dataFormat;?>">
                    <header>
                        <?php echo $output_typeressource;?>
                        <h1>
                           <a href="<?php the_permalink(); ?>">
                            <?php the_title();?>
                            </a>
                        <?php
                        if( $niveaux ): 
                            foreach( $niveaux as $niveau ): ?>
                                <small>Niveau : <?php echo $niveau->name; ?></small>
                        <?php endforeach; 
                          endif; ?>
                        </h1>
                        <figure><?php the_post_thumbnail( 'illustration-article' ); ?></figure>

                    </header>
                    <section>
                       <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="tag"><span class="icon-angle-right"></span> Lire la suite</a>
                    </section>

                </article>
                <?php
                }
            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();            
            
            ?>
       
        </section>
        <aside>
            <section>
               <h2 class="typeRessouces">Types de ressources</h2>
               <?php
              // Appel du module de listing des terms pour la taxonomie nommée
                taxonomies_list(typeressource);
                ?>
                <h2 class="niveaux">Niveaux</h2>
               <?php
              // Appel du module de listing des terms pour la taxonomie nommée
                taxonomies_list(niveau);
                ?>
               
            </section>
            <section>
               <h2>Informations</h2>
               <?php include('side-nav.php');?>
               <h2>Autre menu</h2>
               <?php wp_nav_menu(array('menu_id' => 'side-menu', 
                        'container' => 'nav', 
                        'container_id' => 'sidebar-wrapper', 
                        'container_class' => 'navLeft',
                        'depth' => '1'
                       )); 
?>
            </section>
            
            
       </aside>
        


    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
?>
