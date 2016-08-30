<?php
/******************************************************************
* ZONES DE WIDGETS
*
* zones de widgets pour homepage
*
*/

// Register Sidebars
function custom_sidebars() {
    
    $args = array(
		'id'            => 'one-column',
		'name'          => esc_html__( 'Zone 1 colonne', 'portal-serviceedu'),
		'description'   => esc_html__( 'zone de widgets à 1 colonne', 'portal-serviceedu' ),
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	);
	register_sidebar( $args );
    
    
	$args = array(
		'id'            => 'two-columns',
		'name'          => esc_html__( 'Zone 2 colonnes', 'portal-serviceedu' ),
		'description'   => esc_html__( 'zone de widgets à 2 colonnes', 'portal-serviceedu' ),
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	);
	register_sidebar( $args );
    
    $args = array(
		'id'            => 'three-columns',
		'name'          => esc_html__( 'Zone 3 colonnes', 'portal-serviceedu' ),
		'description'   => esc_html__( 'zone de widgets à 3 colonnes', 'portal-serviceedu' ),
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );




?>