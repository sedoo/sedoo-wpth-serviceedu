<?php
/*
Template Name: Fiche
*/
?>
<?php
get_header(); ?>
<h1>FICHE.PHP</h1>
<div class="wrapper-container">
	<main role="main" class="full" data-theme="<?php echo "$theme"; ?>">

		<?php
		while ( have_posts() ) : the_post();

			/*get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();
*/
			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) :
//				comments_template();
//			endif;
        ?>
            <article>
                <header>
                    <section role="metaTags">
                       <?php //************** DISCIPLINE  *********************************************
                        $themes = get_the_terms( $post->ID, 'thematique'); 

                        if( $themes ): 
                            foreach( $themes as $theme ): ?>
                            
                            <a href="<?php echo get_term_link( $theme ); ?>" title="Voir toutes les documents de cette thématique">
                                 <svg class="">
                                  <use xlink:href="#<?php echo $theme->slug; ?>"/>
                                </svg>
                                <span><?php echo $theme->name; ?></span>
                            </a>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        <div>
                            <p>
                               <?php //************** DISCIPLINE  *********************************************
                                $terms = get_the_terms( $post->ID, 'typeressources'); 

                                if( $terms ): 
                                    foreach( $terms as $term ): ?>
                                        <span class="icon-<?php echo get_term_slug( $term ); ?>"></span>
                                            <?php echo $term->name; ?> 
                                    <?php endforeach; ?>
                                <?php endif; ?>
                               
                            </p>
                        </div>
                    </section>
            </article>
        <?php
		endwhile; // End of the loop.
		?>

    </main>
</div>

<?php
get_footer();
