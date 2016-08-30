<?php
/******************************************************************
* CUSTOM TAXONOMIES 
*/


add_action('init', 'my_custom_taxonomies');
function my_custom_taxonomies()
{
  
// Thematiques 
register_taxonomy(
  'thematique',
  'page',
  array(
    'label' => 'Thematiques',
    'labels' => array(
        'name' => 'Thématiques',
        'singular_name' => 'Thématique',
        'all_items' => 'Toutes les thématiques',
        'edit_item' => 'Éditer la thématique',
        'view_item' => 'Voir la thématique',
        'update_item' => 'Mettre à jour la thématique',
        'add_new_item' => 'Ajouter une thématique',
        'new_item_name' => 'Nouvelle thématique',
        'search_items' => 'Rechercher parmi les thématiques',
        'popular_items' => 'Thematiques les plus utilisées'
      ),
    'hierarchical' => true,
    'show_ui'   => true
  )
);   
      
// type de ressource
register_taxonomy(
  'typeressource',
  'page',
  array(
    'label' => 'Types de ressources',
    'labels' => array(
        'name' => 'Types de ressources',
        'singular_name' => 'Type de ressource',
        'all_items' => 'Tous les types de ressources',
        'edit_item' => 'Éditer le type de ressource',
        'view_item' => 'Voir le type de ressource',
        'update_item' => 'Mettre à jour le type de ressource',
        'add_new_item' => 'Ajouter un type de ressource',
        'new_item_name' => 'Nouveau type de ressource',
        'search_items' => 'Rechercher parmi les types de ressources',
        'popular_items' => 'Types de ressources les plus utilisés'
      ),
    'hierarchical' => true,
    'show_ui'   => true
  )
);   
    
// Niveau pour fiches pédagogiques
register_taxonomy(
  'niveau',
  'page',
  array(
    'label' => 'Niveaux',
    'labels' => array(
        'name' => 'Niveaux',
        'singular_name' => 'Niveau',
        'all_items' => 'Tous les niveaux',
        'edit_item' => 'Éditer le niveau',
        'view_item' => 'Voir le niveau',
        'update_item' => 'Mettre à jour le niveau',
        'add_new_item' => 'Ajouter un niveau',
        'new_item_name' => 'Nouveau niveau',
        'search_items' => 'Rechercher parmi les niveaux',
        'popular_items' => 'Niveaux les plus utilisés'
      ),
    'hierarchical' => true,
    'show_ui'   => true
  )
);       

register_taxonomy_for_object_type( 'thematique', 'page' );
    register_taxonomy_for_object_type( 'thematique', 'post' );  
register_taxonomy_for_object_type( 'typeressource', 'page' );
register_taxonomy_for_object_type( 'niveau', 'page' );
 
}  // end my_custom_taxonomies()


?>