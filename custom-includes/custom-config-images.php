<?php
/******************************************************************
* GESTION DES IMAGES
*
* Support des thumbnails (images à la une)
* Tailles d'images
* Paramètre d'attachement par défaut d'une illustration (alignement/lien/taille)
* 
*/

// active les Post thumbnails (images à la une).
add_theme_support( 'post-thumbnails' );

// Ajout de tailles d'images
add_action( 'after_setup_theme', 'images_setup' );
function images_setup() {
    add_image_size( 'panorama', 1024, 430, false );
 }


// set default attachment setting
add_action( 'after_setup_theme', 'default_attachment_display_settings' );
function default_attachment_display_settings() {
    update_option( 'image_default_align', 'right' );
    update_option( 'image_default_link_type', 'none' );
    update_option( 'image_default_size', 'medium' );
}

?>