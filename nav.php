
<!-- Toggle menu -->

<input type="checkbox" id="menu-toggle">
<label for="menu-toggle" aria-controls="navLeft"></label>


<nav id="sidebar-wrapper" aria-labelledby="navLeft">
   <ul class="sidebar-nav">

       <li id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
                Thématiques <span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse collapse"><!-- class "in" si active -->
                <div class="panel-body">
                    <ul class="nav">
                        <li class="active"><a href="#">Atmosphère</a></li>
                        <li><a href="#">Astronomie</a></li>
                        <li><a href="#">Biosphère</a></li>
                        <li><a href="#">Ecologie</a></li>
                        <li><a href="#">Géosciences</a></li>
                        <li><a href="#">Océanographie</a></li>
                        <li><a href="#">Planétologie</a></li>
                    </ul>
                </div>
            </div>
        </li>
       
        <!-- Dropdown
        <li id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl2">
                Formats <span class="caret"></span>
            </a>

            <div id="dropdown-lvl2" class="panel-collapse collapse"><!-- class "in" si active -->
             <!--   <div class="panel-body">
                    <ul class="nav">
                        <li class="active"><a href="#">Fiches pédagogiques</a></li>
                        <li><a href="#">Activités</a></li>
                        <li><a href="#">Outils pédagogiques</a></li>
                        <li><a href="#">Fiches métiers</a></li>
                        <li><a href="#">Vidéos</a></li>
                        <li><a href="#">Programmes officiels</a></li>
                    </ul>
                </div>
            </div>
        </li>-->

        

        <li id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl3">
                Echanges <span class="caret"></span>
            </a>

            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl3" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="nav">
                        <li><a href="#">Projets scolaires</a></li>
                        <li><a href="#">Formations des enseignants</a></li>
                        <li><a href="#">Rencontres avec un chercheur</a></li>
                        <li><a href="#">Visites sur site</a></li>
                    </ul>
                </div>
            </div>
        </li>

    </ul>
</nav>