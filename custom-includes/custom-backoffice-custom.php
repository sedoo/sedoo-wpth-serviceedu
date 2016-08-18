<?php
/******************************************************************
* PERSONNALISATION DE FONCTION DU BACKOFFICE 
*
* fonctions affectant des fonctions du backoffice
* revealid_id_column_content() -> Affiche les ID dans les tableaux de listing de contenu (post/page/customPost/media)
* source : https://premium.wpmudev.org/blog/display-wordpress-post-page-ids/
*/

/******************************************************************
* Affiche les ID dans les tableaux de listing de contenu (post/page/customPost/media) 
*/ 

function revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}

// ID sur POSTS + PAGES + MEDIAS
add_filter( 'manage_posts_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 5, 2 );
add_filter( 'manage_pages_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_pages_custom_column', 'revealid_id_column_content', 5, 2 );
add_filter( 'manage_media_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_media_custom_column', 'revealid_id_column_content', 5, 2 );


// ID sur CUSTOM POST

/**
ATTENTION : commentaire d'un utilisateur sur le site source

Thanks for this post! I used it for a custom post type and found that in your example it should be:

add_filter( ‘manage_project_posts_columns’, ‘revealid_add_id_column’ );
add_action( ‘manage_project_posts_custom_column’, ‘revealid_id_column_content’ );

Note the addition of “posts” after “project”.

*/
            // ************ A TESTER ***********
//$custom_post_types = get_post_types( 
//   array( 
//      'public'   => true, 
//      '_builtin' => false 
//   ), 
//   'names'
//); 
//
//foreach ( $custom_post_types as $post_type ) {
//    add_filter( 'manage_'. $post_type . '_custom_column', 'revealid_id_column_content', 5 );
//	add_action( 'manage_edit-'. $post_type . '_columns', 'revealid_add_id_column', 5, 2 );
//	
//}

// ID sur Taxonomies
            // ************ BUG ***********
//$taxonomies = get_taxonomies();
//
//foreach ( $taxonomies as $taxonomy ) {
//    add_filter( 'manage_' . $taxonomy . '_custom_column', 'revealid_id_column_content', 5 );
//	add_action( 'manage_edit-' . $taxonomy . '_columns', 'revealid_add_id_column', 5, 2 );
//}

// ID sur USERS   
            // ************ BUG ***********
//add_filter( 'manage_users_custom_column', 'revealid_id_column_content', 5 );
//add_action( 'manage_users_columns', 'revealid_add_id_column', 5, 2 );


// ID sur COMMENTS
add_filter( 'manage_edit-comments_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_comments_custom_column', 'revealid_id_column_content', 5, 2 );

/******************************************************************
* 
*/ 


?>