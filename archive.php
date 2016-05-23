<?php include('header.php');?>

<?php 
$theme=$_GET["theme"];
?>
    <div class="wrapper-container">
    <?php include('nav.php');?>

    <main role="main" class="embed">
      
       <h1 class="<?php echo "$theme"; ?>Border <?php echo "$theme"; ?>Txt"><?php echo "$theme"; ?></h1>
       
       <input type="radio" id="filter-format-all" name="filter-format" checked>
       <input type="radio" id="filter-format-fichePedagogique" name="filter-format">
       <input type="radio" id="filter-format-activite" name="filter-format">
       <input type="radio" id="filter-format-video" name="filter-format">
       <input type="radio" id="filter-format-outil" name="filter-format">
       <input type="radio" id="filter-format-metier" name="filter-format">
       
       <nav role="filter">
           <label for="filter-format-all" class="btn-filter"><span class="glyphicon glyphicon-tag"></span> tout</label>
            <label for="filter-format-fichePedagogique" class="btn-filter"><span class="icon-fiche"></span> Fiche pédagogique</label>
            <label for="filter-format-activite" class="btn-filter"><span class="icon-activite"></span> Activités</label>
            <label for="filter-format-video" class="btn-filter"><span class="icon-video"></span> Vidéos</label>
            <label for="filter-format-outil" class="btn-filter"><span class="icon-outils"></span> Outils pédagogiques</label>
            <label for="filter-format-metier" class="btn-filter"><span class="icon-metier"></span> Fiches métiers</label>
       </nav>

        <?php include('article-embed.php');?>
        <?php include('article-embed-2.php');?>
        <?php include('article-embed-3.php');?>
        <?php include('article-embed-4.php');?>
        <?php include('article-embed-5.php');?>
        <?php include('article-embed-3.php');?>
        <?php include('article-embed-2.php');?>
        <?php include('article-embed-1.php');?>
        <?php include('article-embed.php');?>
        <?php include('article-embed-4.php');?>
        <?php include('article-embed-2.php');?>
        <?php include('article-embed.php');?>
        <?php include('article-embed-5.php');?>
        <?php include('article-embed-3.php');?>
        <?php include('article-embed-3.php');?>
    </main>
    </div>
        
<?php include('svg/disciplines.svg');?>
<?php include('footer.php');?>
