<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portail_service_educatif
 */

get_header(); 

?>

<div class="wrapper-container">
  <main id="main" class="embed" role="main">  
    <h1 class="<?php echo "$term"; ?>Border <?php echo "$term"; ?>Txt">
     <?php
         if (is_tax('thematique', $term)) {
        ?>

       <svg class="">
          <use xlink:href="#<?php echo "$term"; ?>"/>
        </svg>
        <span><?php echo term_name($term);?></span>
        <?php
        }else{
             echo term_name($term);
         }
    ?>
    </h1>
    
<?php
/********************************************************************************/        
// Appel du module de listing des terms pour la taxonomie nommée

if (is_tax('thematique', $term)) {
  $argsTerms = array(
            'taxonomy'  => 'typeressource',
            'order'    => 'ASC',
            'hide_empty' => 0
        );
taxonomies_secondFilter_list(thematique, $term, typeressource, $argsTerms);
}
      
if (is_tax('typeressource', $term)) {
$argsTerms = array(
            'taxonomy'  => 'thematique',
            'order'    => 'ASC',
            'hide_empty' => 1
        );
taxonomies_secondFilter_list(typeressource, $term, thematique, $argsTerms);
}
      
if (is_tax('niveau', $term)) {
$argsTerms = array(
            'taxonomy'  => 'thematique',
            'order'    => 'ASC',
            'hide_empty' => 0
        );
taxonomies_secondFilter_list(niveau, $term, thematique, $argsTerms);
}   

if (is_tax('motcle', $term)) {
$argsTerms = array(
            'taxonomy'  => 'typeressource',
            'order'    => 'ASC',
            'hide_empty' => 0
        );
taxonomies_secondFilter_list(motcle, $term, typeressource, $argsTerms);
} 
      
/********************************************************************************/      
      
// Requete différente si le 2eme niveau de filtre est chargé
if ($_GET['second_filter']) {
    // WP_Query arguments

    // exclusions
    // recup options de "Custom Settings" dans backoffice
    $exclude_idsListPages=explode(",", get_option('idPageExcluded'));

    $argsListPages = array (
        'post_type'             => array( 'page' ),
        'post_status'           => array( 'publish' ),
        'orderby'               => 'ASC',   
        'posts_per_page'        => 6,
        'paged'                 => get_query_var( 'paged' ),
        'post__not_in'          => $exclude_idsListPages,
        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => get_query_var( 'taxonomy' ),
                                'field'    => 'slug',
                                'terms'    => $term ,
                            ),
                            array(
                                'taxonomy' => $_GET['taxonomy_name'],
                                'field'    => 'slug',
                                'terms'    => $_GET['term'],
                            ),
                        ),
    );

    list_pages($argsListPages);
}
else {

    $argsListPages = array (
        'post_type'             => array( 'page' ),
        'post_status'           => array( 'publish' ),
        'orderby'               => 'ASC',   
        'posts_per_page'        => 6,
        'paged'                 => get_query_var( 'paged' ),
        'post__not_in'          => $exclude_idsListPages,
        'tax_query' => array(
                            array(
                                'taxonomy' => get_query_var( 'taxonomy' ),
                                'field'    => 'slug',
                                'terms'    => $term ,
                            )
                        ),
    );

    list_pages($argsListPages);    

}?>
        
    </main>
</div>



<?php
//get_sidebar();
get_footer();
?>