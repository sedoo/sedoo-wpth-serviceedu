<?php include('header.php');?>
<?php 
$theme=$_GET["theme"];
?>
    <div class="wrapper-container">
    <?php //include('nav.php');?>

    <main role="main" class="full" data-theme="<?php echo "$theme"; ?>">
        <article>
            <header>
                <section role="metaTags">
                    <a href="archive.php?theme=<?php echo "$theme"; ?>">
                         <svg class="">
                          <use xlink:href="#<?php echo "$theme"; ?>"/>
                        </svg>
                        <span><?php echo "$theme"; ?></span>
                    </a>
                    <div>
                        <p>
                            <span class="icon-fiche"></span> Fiche pédagogique
                        </p>
<!--
                        <span>
                            Niveau : collège
                        </span>
-->
                    </div>
                </section>
<!--                <p class="aeroBg">Atmosphère</p>-->
                <h1>L'activité des masses d'air Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet
                <small>Niveau : collège</small></h1>
                <figure><img src="images/massesdair.jpg" alt=""></figure>
                
            </header>
            <section>
                <h1>Lorem ipsum dolor sit amet</h1>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit quasi quibusdam temporibus voluptatem consequuntur numquam blanditiis suscipit, obcaecati assumenda! Suscipit ipsa quaerat odit deleniti voluptate debitis distinctio aut temporibus, similique.</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta fuga hic excepturi ab magnam beatae, id nihil expedita repudiandae, sunt dignissimos cupiditate vero nam. Vel, dolorem, odit. Cupiditate, aperiam, adipisci.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta fuga hic excepturi ab magnam beatae, id nihil expedita repudiandae, sunt dignissimos cupiditate vero nam. Vel, dolorem, odit. Cupiditate, aperiam, adipisci.</p>
                <div class="videoWrapper">
                    <iframe frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/K84LNoTnJu8?list=PL0_aTQir3ia4GgsOJdxSgr_q9UaHDQQO1"></iframe>
                </div>
            </section>
            <aside>
                <h2>Aller plus loin</h2>
                <section>
                    <h3>Mots clés</h3>
                    <a href="" class="tag"><span class="icon-tag"></span> Truc</a>
                    <a href="" class="tag"><span class="icon-tag"></span> Machin</a>
                    <a href="" class="tag"><span class="icon-tag"></span> Chose</a>
                </section>
                <section>
                   <h3>Support(s)</h3>
                    <a href="" class="tag"><span class="icon-tag"></span> Document</a>
                    <a href="" class="tag"><span class="icon-tag"></span> Video</a>
                    <a href="" class="tag"><span class="icon-tag"></span> Article</a>
                </section>
                <section>
                    <h3>Documents associés</h3>
                    <a href="#" class="tag"><span class="icon-fiche"></span> Fiche machin</a>
                    <a href="#" class="tag"><span class="icon-activite"></span> Activité machin</a>
                    <a href="#" class="tag"><span class="icon-activite"></span> Activité machin 2</a>
                    <a href="#" class="tag"><span class="icon-picture"></span> Diaporama truc</a>
                </section>
            </aside>
            <footer>
                
            </footer>
        </article>
    </main>
    </div>
        
<?php include('footer.php');?>
