<?php
/******************************************************************
* HELPERS
*
* fonctions utiles :
* get_depth() -> donne le niveau de profondeur hiérarchique d'une page
*
*/

/******************************************************************
* GET DEPTH 
*/

function get_depth($postid) {
    $depth = ($postid==get_option('page_on_front')) ? -1 : 0;
    while ($postid > 0) {
        $postid = get_post_ancestors($postid);
        $postid = $postid[0];
        $depth++;
    }
    return $depth;
}

?>