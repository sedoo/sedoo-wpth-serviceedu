<?php
if ( ! is_active_sidebar('two-columns') ) {
    return;
}
?>

<section id="zone2columns">
    <?php dynamic_sidebar( 'two-columns' ); ?>
</section><!-- #site-navigation -->
