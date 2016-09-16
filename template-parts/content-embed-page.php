<?php
/**
 * Template part for displaying embed page in taxonomy.php.
 *
 * @package portail_service_educatif
 */

$themes = get_the_terms( $post->ID, 'thematique');            
$typeressources = get_the_terms( $post->ID, 'typeressource'); 
$niveaux = get_the_terms( $post->ID, 'niveau');
        
if ( $themes) {
    $outputTheme="";
    foreach ($themes as $theme) {
        $outputTheme.='<div class="'.$theme->slug.'Bg">
            <svg class="">
                  <use xlink:href="#'.$theme->slug.'"/>
                </svg>                  
        </div>';
        // class="<?php echo $outputTheme;Border"
    } 
}

if( $typeressources ){
    $outputTyperessource="";
    foreach( $typeressources as $typeressource ) {
        $outputTyperessource.="<p><span class=\"icon-".$typeressource->slug."\"></span> ".$typeressource->name."</p>\n";
    }              
}

?>
<article>
   <?php echo $outputTheme;?>
    <header>
        <?php echo $outputTyperessource;?>
        <h1>
           <a href="<?php the_permalink(); ?>">
            <?php the_title();?>
            </a>
        <?php
        if( $niveaux ): 
            foreach( $niveaux as $niveau ): ?>
                <small><?php echo $niveau->name; ?></small>
        <?php endforeach; 
          endif; ?>
        </h1>
        <figure><?php the_post_thumbnail( 'illustration-article' ); ?></figure>

    </header>
    <section>
       <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>" class="tag"><span class="icon-angle-right"></span> Lire la suite</a>
    </section>
</article>