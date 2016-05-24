<?php
   

function listCustomTaxonomy() {
    
/* 
* Liste des Customs taxonomy
*/
    echo "<h1>Liste des catégories de mots clés</h1> ";
    echo '<section id="list">';
    
    $args = array( 'public' => true, '_builtin' => false );
    
    $output = 'objects'; // or objects, names
    $taxonomies = get_taxonomies( $args, $output );
    if ($taxonomies) {
      foreach ( $taxonomies  as $taxonomy ) {
        echo '<div class="termBox">';
        echo '<h2><a href="edit-tags.php?taxonomy=' . $taxonomy->name . '">' . $taxonomy->label . ' <span class="dashicons-before dashicons-welcome-write-blog"></span></a></h2>';
        echo '<div class="inside">';
          
        // Creation de la liste des terms de la taxonomie nommée
        $argsTerms = array(
            'orderby'    => 'asc',
            'hide_empty' => 0
        );
          
        $terms=get_terms($taxonomy->name,$argsTerms); 
        if  ($terms) {
          foreach ($terms  as $term ) {
            echo '<p>' . $term->name . '</p>';
          }
        } 
        echo '</div></div>';
      }
    }
    echo '</section> ';  

    
    echo '<hr>';
    
}

?>