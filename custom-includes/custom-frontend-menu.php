<?php
/******************************************************************
* MENU FRONT END
*
* fonctions affectant les menus en front end
* register_menu_location() -> Ajoute des emplacements de menu
*/


/** 
 * Ajout d'emplacements de menu
*/
function register_menu_location() {
  register_nav_menus(
    array(
      'side-menu' => __( 'Side Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_menu_location' );

?>