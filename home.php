<?php
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
        <h1>Welcome !</h1>



    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
?>