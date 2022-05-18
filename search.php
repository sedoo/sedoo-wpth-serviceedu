<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package portail_service_educatif
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Résultats pour: %s', 'portal-serviceedu' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
		<main id="main" class="site-main embed" role="main">

		<?php
		if ( have_posts() ) : ?>
			 <section class="twoColumns">


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				// get_template_part( 'template-parts/content', 'search' );
				get_template_part( 'template-parts/content', 'embed-page' );

			endwhile;
			?>
			</section>
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
			

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
