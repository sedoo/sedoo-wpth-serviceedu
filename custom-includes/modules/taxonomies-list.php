<?php
/******************************************************************
* Creation de la liste des terms d'une taxonomie nommée 
*/

function term_name($term) {

$thematiques=array(
    "aero" => "Atmosphère",
    "astro" => "Astronomie",
    "biosphere" => "Biosphère",
    "ecologie" => "Ecologie",
    "geosciences" => "Géosciences",
    "oceano" => "Océanographie",
    "planeto" => "Planétologie",
);

$nameTyperessources=array(
    "activite" => "Activités",
    "metier" => "Fiches métiers",
    "fichepedagogique" => "Fiches pédagogiques",
    "outils" => "Outils pédagogiques",
    "video" => "Vidéos",
);
    
$nameNiveaux=array(
    "1primaire" => "Primaire",
    "2college" => "collège",
    "3lycee" => "Lycée",
    "4sup" => "Enseignement supérieur",
);
    
if (is_tax('thematique', $term)) {
  $title = $thematiques[$term];
 }
if (is_tax('typeressource', $term)) {
  $title = $nameTyperessources[$term];
 }
if (is_tax('niveau', $term)) {
  $title = $nameNiveaux[$term];
 }

    return $title;
}

function taxonomies_list($taxonomy_name, $argsTerms) {
        
    $terms=get_terms($argsTerms);
    if  ($terms) {    
        // concatenation de la liste dans $termsList pour préparer le code html généré 
      foreach ($terms  as $term ) {
        $termsList.='<a href="'.site_url().'/'.$taxonomy_name.'/'.$term->slug.'" class="tag">
                       <span class="icon-'.$term->slug.'"></span> '.$term->name.'  <span class="badge">'.$term->count.'</span></a> ';
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

function taxonomies_secondFilter_list($masterTaxonomyName, $masterTermSlug, $taxonomy_name, $argsTerms) {
        
    $terms=get_terms($argsTerms); 
    if  ($terms) {    
        // concatenation de la liste dans $termsList pour préparer le code html généré 
      $i=1;
      foreach ($terms  as $term ) {
          
        // recupération de l'url courante (current_page_url()) et création d'une nouvelle url avec parametres $_GET
        $url = add_query_arg(array(
                            'second_filter' => 'true',
                            'taxonomy_name' => $taxonomy_name,
                            'term' => $term->slug,
                            ), current_page_url() );
          
          /* vérification de la présence des terms dans la liste de page du terme "maitre"
          * par défaut, get_terms() renvoie la liste de TOUS les terms
          * On ne veut afficher seulement, que les terms en relation avec le terme "maitre" 
          * 
          */
          
          //WP_Query
          $argsListPages = array (
            'post_type'             => array( 'page' ),
            'post_status'           => array( 'publish' ),
            'tax_query' => array(
                                'relation' => 'AND',
                                array(
                                    'taxonomy' => $masterTaxonomyName,
                                    'field'    => 'slug',
                                    'terms'    => $masterTermSlug ,
                                ),
                                array(
                                    'taxonomy' => $taxonomy_name,
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                ),
                            ),
            );
            $queryListPages = new WP_Query( $argsListPages );
            $count=$queryListPages->post_count;
          
            // si résultat, on affiche le term avec le nbre de post associé
            if ($count > 0) {
                $termsList.='<a href="'.$url.'" class="tag">
                       <span class="icon-'.$term->slug.'"></span> '.$term->name.' <span class="badge">'.$count.'</span></a> ';
            }
          
        
        }
        
        ?>
        <nav role="termsList">
        <h2>Filtre</h2>
        <?php
        echo $termsList;
        ?>
        </nav>
        <?php
    }  
}

?>