<?php
/******************************************************************
* GESTION DES IMAGES
*
* Support des thumbnails (images à la une)
* Tailles d'images
* Paramètre d'attachement par défaut d'une illustration (alignement/lien/taille)
*
*  https://developer.wordpress.org/reference/functions/add_image_size/ 
*/

// active les Post thumbnails (images à la une).
add_theme_support( 'post-thumbnails' );

/* Ajout de tailles d'images
* https://developer.wordpress.org/reference/functions/add_image_size/
*/
add_action( 'after_setup_theme', 'images_setup' );
function images_setup() {
    add_image_size( 'illustration-article', 1024, 500, true );
 }


// set default attachment setting
add_action( 'after_setup_theme', 'default_attachment_display_settings' );
function default_attachment_display_settings() {
    update_option( 'image_default_align', 'center' );
    update_option( 'image_default_link_type', 'none' );
    update_option( 'image_default_size', 'medium' );
}

/* Insérer les <img> avec dans un element <figure> + <figcaption>
* https://css-tricks.com/snippets/wordpress/insert-images-with-figurefigcaption/
*/
//function html5_insert_image($html, $id, $caption, $title, $align, $url) {
//  $html5 = "<figure id='post-$id media-$id' class='align-$align'>";
//  $html5 .= "<img src='$url' alt='$title' />";
//  if ($caption) {
//    $html5 .= "<figcaption>$caption</figcaption>";
//  }
//  $html5 .= "</figure>";
//  return $html5;
//}
//add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

function html5_insert_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
$url = wp_get_attachment_url($id);
$src = wp_get_attachment_image_src( $id, $size, false );
$html5 = "<a href='$url'><figure class='align$align'>";
$html5 .= "<img src='$src[0]' alt='$alt' />";
if ($caption) {
$html5 .= "<figcaption>$caption</figcaption>";
}
$html5 .= "</figure></a>";
return $html5;
}
add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

?>