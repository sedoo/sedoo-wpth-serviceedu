<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portail_service_educatif
 */

get_header(); 

$thematiques=array(
    "aero" => "Atmosphère",
    "astro" => "Astronomie",
    "biosphere" => "Biosphère",
    "ecologie" => "Ecologie",
    "geosciences" => "Géosciences",
    "oceano" => "Océanographie",
    "planeto" => "Planétologie"
);

if (is_tax('thematique', $term)) {
  $title = $thematiques[$term];
 }
?>

<div class="wrapper-container">
<!-- class="embed"-->
  <main id="main"  role="main">
    <h1 class="<?php echo "$term"; ?>Border <?php echo "$term"; ?>Txt">
           <svg class="">
              <use xlink:href="#<?php echo "$term"; ?>"/>
            </svg>
            <span><?php echo "$title";?></span>
        </h1>
     
       <?php
      // Appel du module de filtrage taxonomie
        //taxonomies_filter(typeressource);
        ?>

		<?php
		if ( have_posts() ) : ?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

                $typeressources = get_the_terms( $post->ID, 'typeressource'); 
                $niveaux = get_the_terms( $post->ID, 'niveau');
      
                if( $typeressources ): 
                    $dataFormat="";
                    $output_typeressource="";
                    foreach( $typeressources as $typeressource ): 
                        $dataFormat.="".$typeressource->slug." ";
                        $output_typeressource.="<p><span class=\"icon-".$typeressource->slug."\"></span> ".$typeressource->name."</p>\n";
                    endforeach; 
                endif; 
            ?>
				<article data-format="<?php echo $dataFormat;?>">
                    <header>
                        <?php echo $output_typeressource;?>
                        <h1><?php the_title();?>
                        <?php
                        if( $niveaux ): 
                            foreach( $niveaux as $niveau ): ?>
                                <small>Niveau : <?php echo $niveau->name; ?></small>
                        <?php endforeach; 
                          endif; ?>
                        </h1>
                        <figure><?php the_post_thumbnail( 'illustration-article' ); ?></figure>

                    </header>
                    <section>
                       <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="tag"><span class="icon-angle-right"></span> Lire la suite</a>
                    </section>

                </article>

		<?php	endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main>
	</div>



<?php
//get_sidebar();
get_footer();?>

