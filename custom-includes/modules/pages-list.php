<?php
/******************************************************************
* Creation de liste des pages en fonction d'arguments passés à WP_Query()
*/

function list_pages($arg){

// The Query
    $queryListPages = new WP_Query( $arg );

    // The Loop
    if ( $queryListPages->have_posts() ) {
        while ( $queryListPages->have_posts() ) :
            $queryListPages->the_post();
            
            $theme = get_the_terms( $post->ID, 'thematique');
            
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
                <section role="metaTags">
                <?php echo $output_typeressource;?>
                </section>
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
               <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="tag"><span class="icon-angle-right"></span> Lire la suite</a>
            </section>

        </article>
        <?php
        endwhile;
        the_posts_navigation();
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();
}

function related_list_pages($arg){

// The Query
    $queryRelatedListPages = new WP_Query( $arg );

    // The Loop
    if ( $queryRelatedListPages->have_posts() ) {
        while ( $queryRelatedListPages->have_posts() ) :
            $queryRelatedListPages->the_post();
            
            $theme = get_the_terms( $post->ID, 'thematique');
            
            $typeressources = get_the_terms( $post->ID, 'typeressource'); 
            $niveaux = get_the_terms( $post->ID, 'niveau');
            
            if( $typeressources ):
                $output_typeressource="";
                $output_typeressourceNames="";
                foreach( $typeressources as $typeressource ):
                    $output_typeressource.="<span class=\"icon-".$typeressource->slug."\"></span> ";
                    $output_typeressourceNames.="".$typeressource->name." / ";
                endforeach;                 
            endif; 

            ?>
              <a href="<?php the_permalink(); ?>" class="tag" title="<?php echo $output_typeressourceNames;?><?php the_title();?>">
                  <?php echo $output_typeressource;?>
                    <br>
                  <?php the_title();?> 
              </a>   
            
        
        <?php
        endwhile;
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();
}


?>