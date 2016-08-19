<?php
/**
 * fonctions custom 
 * 
 */

/******************************************************************
* HELPERS
*
* fonctions utiles :
* get_depth() -> donne le niveau de profondeur hiérarchique d'une page
*
*/
//include 'custom-helpers.php';

/******************************************************************
* MODULES
*
* taxonomies-filter : filtre css pour taxonomies
* taxonomies-list : liste les terms d'une taxonomie
*
*/
include 'modules/taxonomies-filter.php';
include 'modules/taxonomies-list.php';

/******************************************************************
* CUSTOM TAXONOMIES 
*
* fonctions de déclaration des taxonomies (mots clés) personnalisés
*
*/
include 'custom-taxonomies.php';

/******************************************************************
* CUSTOM TAXONOMIES 
*
* fonctions de déclaration des types de page personnalisés
*
*/
include 'custom-post-type.php';

/******************************************************************
* MENU FRONT END
*
* fonctions affectant les menus en front end
* register_menu_location() -> Ajoute des emplacements de menu
*
*/
//include 'custom-frontend-menu.php';

/******************************************************************
* MENU DANS BACKOFFICE 
*
* fonctions affectant le menu du backoffice
* my_admin_taxonomy_menu() -> Interface de gestion des taxonomies custom
*
*/
include 'custom-backoffice-menu.php';

/******************************************************************
* PERSONNALISATION DE FONCTION DU BACKOFFICE 
*
* fonctions affectant des fonctions du backoffice
* revealid_id_column_content() -> Affiche les ID dans les tableaux de listing de contenu (post/page/customPost/media)
*
*/
include 'custom-backoffice-custom.php';


/******************************************************************
* GESTION DES IMAGES
*
* Support des thumbnails (images à la une)
* Tailles d'images
* Paramètre d'attachement par défaut d'une illustration (alignement/lien/taille)
* 
*/
include 'custom-config-images.php';

/******************************************************************
* AJOUT DE FEUILLES DE STYLES
*
* backoff.css -> pour layouts pages admin custom
*
*/
include 'custom-css.php';