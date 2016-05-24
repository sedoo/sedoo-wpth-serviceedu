<?php
/******************************************************************
* MENU DANS BACKOFFICE 
*/

/***********
* INTERFACE DE GESTION DES TAXONOMIES 
*/

add_action( 'admin_menu', 'my_admin_taxonomy_menu' );

function my_admin_taxonomy_menu() {
	add_menu_page( 'Gestion des taxonomies', 'Mots clés', 'manage_options', 'custom-taxonomie-admin-menu.php', 'listCustomTaxonomy', 'dashicons-tag', 6  );
    
    // liste des sous-menu de custom taxonomies
    $args = array( 'public' => true, '_builtin' => false ); 
    $output = 'objects'; // or objects, names
    $taxonomies = get_taxonomies( $args, $output );
    if ($taxonomies) {
      foreach ( $taxonomies  as $taxonomy ) {
        add_submenu_page('custom-taxonomie-admin-menu.php', $taxonomy->label,
            $taxonomy->label, 'manage_options', 'edit-tags.php?taxonomy='.$taxonomy->name.'','');
      }
    }
}

// HIGHLIGHT menu pour les custom taxonomies pour que l'édition reste dans le bon menu admin
add_action( 'parent_file', 'menu_highlight' );

function menu_highlight( $parent_file ) {
    global $current_screen;

    $taxonomy_in_menu = $current_screen->taxonomy;
    
    // liste des sous-menu de custom taxonomies
    $args = array( 'public' => true, '_builtin' => false ); 
    $output = 'objects'; // or objects, names
    $taxonomies = get_taxonomies( $args, $output );
    if ($taxonomies) {
      foreach ( $taxonomies  as $taxonomy ) {
    
        if ( $taxonomy_in_menu == $taxonomy->name ) {
            $parent_file = 'custom-taxonomie-admin-menu.php';
        }
      }
    }

    return $parent_file;
}

// LAYOUTS PAGE ADMIN
include 'custom-layouts/custom-taxonomie-admin-menu.php';

?>