<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portail_service_educatif
 */

get_header(); ?>
<div class="wrapper-container">
  <main id="main" class="embed archive" role="main"> 

		<?php
		if ( have_posts() ) : ?>

			<h1>
				<?php
					the_archive_title();
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</h1>
            <section class="twoColumns">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'embed-page' );
                
			endwhile;
                
			the_posts_navigation();
                
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
           </section>
        <?php
        get_sidebar();
        ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
