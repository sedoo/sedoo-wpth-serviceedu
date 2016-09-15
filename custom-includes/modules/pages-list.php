<?php

/******************************************************************
* Template des pages embed
*/

function show_pages(){
    
}

/******************************************************************
* Creation de liste des pages en fonction d'arguments passés à WP_Query()
*/

function list_pages($arg){

// The Query
    $queryListPages = new WP_Query( $arg );

    // The Loop
    if ( $queryListPages->have_posts() ) {
    ?>
    <div id="i-scroll">    
        <?php
        while ( $queryListPages->have_posts() ) :
            $queryListPages->the_post();
            
            $themes = get_the_terms( $post->ID, 'thematique');            
            $typeressources = get_the_terms( $post->ID, 'typeressource'); 
            $niveaux = get_the_terms( $post->ID, 'niveau');
        
            if ( $themes) {
                $outputTheme="";
                foreach ($themes as $theme) {
                    $outputTheme.='<div class="'.$theme->slug.'Bg">
                        <svg class="">
                              <use xlink:href="#'.$theme->slug.'"/>
                            </svg>                  
                    </div>';
                    // class="<?php echo $outputTheme;Border"
                } 
            }

            if( $typeressources ){
                $outputTyperessource="";
                foreach( $typeressources as $typeressource ) {
                    $outputTyperessource.="<p><span class=\"icon-".$typeressource->slug."\"></span> ".$typeressource->name."</p>\n";
                }              
            } 
        ?>
       
        <article>
           <?php echo $outputTheme;?>
            <header>
                <?php echo $outputTyperessource;?>
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
        
    } else {
        get_template_part( 'template-parts/content', 'none' );
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
                $outputTyperessource="";
                $outputTyperessourceNames="";
                foreach( $typeressources as $typeressource ):
                    $outputTyperessource.="<span class=\"icon-".$typeressource->slug."\"></span> ";
                    $outputTyperessourceNames.="".$typeressource->name." / ";
                endforeach;                 
            endif; 

            ?>
              <a href="<?php the_permalink(); ?>" class="tag" title="<?php echo $outputTyperessourceNames;?><?php the_title();?>">
                  <?php echo $outputTyperessource;?>
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