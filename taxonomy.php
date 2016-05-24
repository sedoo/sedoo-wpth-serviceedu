<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portail_service_educatif
 */

get_header(); 

$term=array(
    "Atmosphère" => "aero",
    "astro" => "Astronomie"
);
echo $term[Atmosphère];

if (is_tax('thematique', '$term')) {
  $title = $term[1];
  $slugTitle = "aero";
 }
    


?>


<div class="wrapper-container">
  <main id="main" class="embed" role="main">
    <h1 class="<?php echo "$slugTitle"; ?>Border <?php echo "$slugTitle"; ?>Txt">
           <svg class="">
              <use xlink:href="#<?php echo "$slugTitle"; ?>"/>
            </svg>
            <span><?php echo "$title";?></span>
        </h1>

       
       <input type="radio" id="filter-format-all" name="filter-format" checked>
       <input type="radio" id="filter-format-fichePedagogique" name="filter-format">
       <input type="radio" id="filter-format-activite" name="filter-format">
       <input type="radio" id="filter-format-video" name="filter-format">
       <input type="radio" id="filter-format-outils" name="filter-format">
       <input type="radio" id="filter-format-metier" name="filter-format">
       
       <nav role="filter">
           <label for="filter-format-all" class="btn-filter"><span class="glyphicon glyphicon-tag"></span> tout</label>
            <label for="filter-format-fichePedagogique" class="btn-filter"><span class="icon-fiche"></span> Fiche pédagogique</label>
            <label for="filter-format-activite" class="btn-filter"><span class="icon-activite"></span> Activités</label>
            <label for="filter-format-video" class="btn-filter"><span class="icon-video"></span> Vidéos</label>
            <label for="filter-format-outils" class="btn-filter"><span class="icon-outils"></span> Outils pédagogiques</label>
            <label for="filter-format-metier" class="btn-filter"><span class="icon-metier"></span> Fiches métiers</label>
       </nav>
<!--
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
-->
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
//					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main>
	</div>

<?php
//get_sidebar();
get_footer();?>
<h1>TAXONOMIE.PHP</h1>