<?
/******************************************************************
* Creation de liste des pages en fonction d'arguments passés à WP_Query()
*/

function list_pages($arg){

    $thematiques=array(
    "aero" => "Atmosphère",
    "astro" => "Astronomie",
    "biosphere" => "Biosphère",
    "ecologie" => "Ecologie",
    "geosciences" => "Géosciences",
    "oceano" => "Océanographie",
    "planeto" => "Planétologie"
    );
    
    
// The Query
    $queryListPages = new WP_Query( $arg );

    // The Loop
    if ( $queryListPages->have_posts() ) {
        while ( $queryListPages->have_posts() ) {
            $queryListPages->the_post();
            
            $theme = get_the_terms( $post->ID, 'thematique');
            
//            if (is_tax('thematique', $term)) {
//              $title = $thematiques[$term];
//             }
            
            $typeressources = get_the_terms( $post->ID, 'typeressource'); 
            $niveaux = get_the_terms( $post->ID, 'niveau');

            if( $typeressources ): 
//                $dataFormat="";
                $output_typeressource="";
                foreach( $typeressources as $typeressource ): 
//                    $dataFormat.="".$typeressource->slug." ";
                    $output_typeressource.="<p><span class=\"icon-".$typeressource->slug."\"></span> ".$typeressource->name."</p>\n";
                endforeach; 
            endif; 
        ?>
        <article class="<?php echo $theme[0]->slug;?>Border">
            <header>
                <?php echo $output_typeressource;?>
                <h1>
                   <a href="<?php the_permalink(); ?>">
                    <?php the_title();?>
                    </a>
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
}
?>