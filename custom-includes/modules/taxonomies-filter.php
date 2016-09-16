<?php
/******************************************************************
* Filtre Full CSS en fonction des customs taxonomies 
* A n'utiliser que si peu de résultats dans list_pages() (pages-list.php)
*/

function taxonomies_filter($taxonomy_name) {
    
    $argsTerms = array(
            'taxonomy'  => $taxonomy_name,
            'orderby'    => 'asc',
            'hide_empty' => 0
        );
    
    $terms=get_terms($argsTerms); 
    if  ($terms) {
        
    $inputs="<input type=\"radio\" id=\"filter-format-all\" name=\"filter-format\" checked>";   // filtre all
    $labels="<label for=\"filter-format-all\" class=\"btn-filter\"><span class=\"icon-tag\"></span> tout</label>";  // label all
    
    // concatenation des variables $inputs et $labels pour préparer le code html généré 
      foreach ($terms  as $term ) {
        $inputs.="<input type=\"radio\" id=\"filter-format-$term->slug\" name=\"filter-format\">\r\n";
        $labels.="<label for=\"filter-format-$term->slug\" class=\"btn-filter\"><span class=\"icon-$term->slug\"></span> $term->name</label>\n";
        }
        
        echo $inputs;
        ?>
        <nav role="filter">
        <?php
        echo $labels;
        ?>
        </nav>
        <?php
    }  
}
?>