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


/******************************************************************
* GET current URL
*/

function current_page_url() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}


?>