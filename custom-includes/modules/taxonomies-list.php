<?php
/******************************************************************
* Creation de la liste des terms d'une taxonomie nommée 
*/

function taxonomies_list($taxonomy_name) {
    
    $argsTerms = array(
            'taxonomy'  => $taxonomy_name,
            'orderby'    => 'asc',
            'hide_empty' => 0
        );
    
    $terms=get_terms($argsTerms); 
    if  ($terms) {    
        // concatenation de la liste dans $termsList pour préparer le code html généré 
      foreach ($terms  as $term ) {
        $termsList.='<a href="'.site_url().'/'.$taxonomy_name.'/'.$term->slug.'" class="tag">
                       <span class="icon-'.$term->slug.'"></span> '.$term->name.'</a> ';
        }
        
        ?>
        <nav role="termsList">
        <?php
        echo $termsList;
        ?>
        </nav>
        <?php
    }  
}
?>