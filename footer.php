<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portail_service_educatif
 */

?>
<footer>
    <address>
        OBSERVATOIRE MIDI-PYRENEES<br>
        14, avenue Edouard Belin - 31400 TOULOUSE<br>
        Tél. +33 (0)5 61 33 29 29<br>
        Fax : +33 (0)5 61 33 28 88<br>
    </address>
    <section>
        <p>Pour nous contacter, merci de nous écrire à cette adresse :<br>service_educatif@obs-mip.fr</p>
        <p>© Copyright Observatoire Midi-Pyrénées 2016 - Service de données OMP (SEDOO)</p>
    </section>
    <section role="tutelles">
        <figure>
            <a href="http://http://www.ac-toulouse.fr/" title="Lien vers le site de l'Académie de Toulouse">
                <img src="<?php bloginfo( 'template_url' ); ?>/images/ac-toulouse_logo.jpg" alt="">
            </a>
            <figcaption>
                <a href="http://http://www.ac-toulouse.fr/" title="Lien vers le site de l'Académie de Toulouse">Académie de Toulouse</a>
            </figcaption>
        </figure>
        <figure>
           <a href="http://www.univ-tlse3.fr" title="Lien vers le site de l'Université Paul Sabatier - Toulouse 3">
                <img src="<?php bloginfo( 'template_url' ); ?>/images/logo_univ-tlse.png" alt="">
            </a>
            <figcaption>
                <a href="http://www.univ-tlse3.fr" title="Lien vers le site de l'Université Paul Sabatier - Toulouse 3">Université Paul Sabatier - Toulouse 3</a>
            </figcaption>
        </figure>
    </section>
</footer>

<?php include('svg/themes-serveduV2.svg');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/toc.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/jquery.sticky.js"></script>
<script src="<?php bloginfo('template_directory');?>/js/infinite-scroll.js"></script>

</body>
</html>
