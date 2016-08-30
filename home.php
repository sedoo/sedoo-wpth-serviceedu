<?php
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
        if ( is_home() | is_front_page() ) : ?>
				<header>
					<h1>Homepage</h1>
				</header>
        
        <?php
        endif;
        ?>
        
        <section>
            <?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) : the_post();
        ?>
        
        <?php
        /******************************************/
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
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
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
            </section>
       </aside>
        


    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
?>