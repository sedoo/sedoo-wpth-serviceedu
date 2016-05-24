<?php
/******************************************************************
* AJOUT DE FEUILLES DE STYLES
*
* backoff.css -> pour layouts pages admin custom
*
*/

/******************************************************************
* FEUILLE DE STYLE POUR BACKOFFICE 
*/

function admin_css() {

$admin_handle = 'admin_css';
$admin_stylesheet = get_template_directory_uri() . '/backoffice_custom/backoff.css';

wp_enqueue_style( $admin_handle, $admin_stylesheet );
}
add_action('admin_print_styles', 'admin_css', 11 );




/******************************************************************
* FEUILLES DE STYLE POUR FRONTEND
* SCRIPTS FRONTEND
*/
/*** Ajouter les styles et scripts perso dans le wp_head() ***/
function utilz_all_scriptsandstyles() {
    // Enqueue the style
    wp_enqueue_style('edu-font', get_bloginfo('template_directory') . '/css/edu-font.css');
//    wp_enqueue_style ('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
    wp_enqueue_style('custom-css-print', get_bloginfo('template_directory') . '/css/print.css', array(), false, 'print');
    // Enqueue the script
//    wp_enqueue_script('jquery-link', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js');
//    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
//    wp_enqueue_script('custom-js', get_bloginfo('template_directory') . '/custom/script.js','1',true);
}

add_action( 'wp_enqueue_scripts', 'utilz_all_scriptsandstyles' );


?>