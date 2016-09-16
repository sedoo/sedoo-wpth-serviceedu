<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package portail_service_educatif
 */

?>

<section class="no-results">
	<header>
		<h1>Pas de résultat...</h1>
	</header>

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'portal-serviceedu' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p>Désolé, rien ne correspond à vos critères de recherche. Merci d'essayer avec d'autres mots clés.
			<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'portal-serviceedu' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p>Vous ne trouvez pas ce que vous cherchez, le moteur de recherche peut vous aider...</p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
