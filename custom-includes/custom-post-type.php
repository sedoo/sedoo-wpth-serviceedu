<?php
/******************************************************************
 * CUSTOM POST
 *
 */


/**
* Ajout de support pour post type standard (page, post, etc...)
*/

// AJOUT DU CHAMP EXCERPT (extrait) sur le post type "page" 
// https://codex.wordpress.org/Function_Reference/add_post_type_support

function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );


/**
* Custom post type
*/

//add_action('init', 'my_custom_post_type');
//function my_custom_post_type()
//{
        
/*
* FICHE PEDAGOGIQUE (exemple)
* utiliser les catégories des post : 'taxonomies' => array( 'post_tag', 'category' ),
*/
    
//register_post_type(
//  'fichepedagogique',
//  array(
//    'label' => 'Fiches pédagogiques',
//    'labels' => array(
//      'name' => 'Fiches pédagogiques',
//      'singular_name' => 'Fiche pédagogique',
//      'all_items' => 'Toutes les fiches pédagogiques',
//      'add_new_item' => 'Ajouter une fiche pédagogique',
//      'edit_item' => 'Éditer la fiche pédagogique',
//      'new_item' => 'Nouvelle fiche pédagogique',
//      'view_item' => 'Voir la fiche pédagogique',
//      'search_items' => 'Rechercher parmi les fiches pédagogiques',
//      'not_found' => 'Pas de fiche pédagogique trouvé',
//      'not_found_in_trash'=> 'Pas de fiche pédagogique dans la corbeille'
//      ),
//    'public' => true,
//    'hierarchical' => true,
//    'capability_type' => 'post',
//    'supports' => array(
//          'title',
//          'editor',
//          'thumbnail',
//          'revisions',
//          'excerpt',
//          'page-attributes' 
//        ),
//    'menu_icon' => 'dashicons-media-spreadsheet',
//    'has_archive' => true
//  )
//);
    
//}  // end my_custom_post_type()

?>