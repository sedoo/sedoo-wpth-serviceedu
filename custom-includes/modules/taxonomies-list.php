<?php
/******************************************************************
* Creation de la liste des terms d'une taxonomie nommée 
*/

function taxonomies_list($taxonomy_name, $argsTerms) {
        
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

function taxonomies_secondFilter_list($taxonomy_name, $argsTerms) {
        
    $terms=get_terms($argsTerms); 
    if  ($terms) {    
        // concatenation de la liste dans $termsList pour préparer le code html généré 
              
      foreach ($terms  as $term ) {
          
        // recupération de l'url courante (current_page_url()) et création d'une nouvelle url avec parametres $_GET
        $url = add_query_arg(array(
                            'second_filter' => 'true',
                            'taxonomy_name' => $taxonomy_name,
                            'term' => $term->slug,
                            ), current_page_url() );
          
        $termsList.='<a href="'.$url.'" class="tag">
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