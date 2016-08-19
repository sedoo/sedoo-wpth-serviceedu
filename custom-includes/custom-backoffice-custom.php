<?php
/******************************************************************
* PERSONNALISATION DE FONCTION DU BACKOFFICE 
*
* fonctions affectant des fonctionnalités du backoffice
*/

/******************************************************************
* Affiche les ID dans les tableaux de listing de contenu (post/page/customPost/media) 
* revealid_id_column_content() -> Affiche les ID dans les tableaux de listing de contenu (post/page/customPost/media)
* source : https://premium.wpmudev.org/blog/display-wordpress-post-page-ids/
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
* Custom Global Settings
* source https://www.taniarascia.com/wordpress-from-scratch-part-two/
*/ 

// Custom settings
function custom_settings_add_menu() {
  add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
  <div class="wrap">
    <h1>Custom Settings</h1>
    <form method="post" action="options.php">
       <?php
           settings_fields('section');
           do_settings_sections('theme-options');      
           submit_button(); 
       ?>          
    </form>
  </div>
<?php }

// Id de la page par défaut du lien "A propos / Echange"
function setting_idPageDefault() { ?>
  <input type="text" name="idPageDefault" id="idPageDefault" value="<?php echo get_option('idPageDefault'); ?>" />
<?php }

function custom_settings_page_setup() {
  add_settings_section('section', 'All Settings', null, 'theme-options');
  add_settings_field('idPageDefault', 'ID page du lien "A propos / échange"', 'setting_idPageDefault', 'theme-options', 'section');

  register_setting('section', 'idPageDefault');
}
add_action( 'admin_init', 'custom_settings_page_setup' );

?>