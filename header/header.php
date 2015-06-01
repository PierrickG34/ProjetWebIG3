<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/controlleur/controlIndex.php">Infos Films</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/controlleur/controlFilms.php">Films</a>
                </li>
                <li>
                    <?php
                        /* Si c'est un admin, alors il voit la page genre dans le header */
                        if(isset($_COOKIE["token"]) && ($_COOKIE["token"] == $allAdmin['admin'][0][0]))
                        {
                            ?><a href="/controlleur/controlGenres.php">Genres</a><?php
                        }
                    ?>
                </li>
                <li>
                    <a href="/controlleur/controlRealisateurs.php">Réalisateurs</a>
                </li>
                <li>
                    <a href="/controlleur/controlRecherches.php">Recherche</a>
                </li>
                <li>
                    <?php
                        /* Si c'est un admin, alors il est deja connecter donc on lui affiche la deconnexion */
                        if(isset($_COOKIE["token"]) && ($_COOKIE["token"] == $allAdmin['admin'][0][0]))
                        {
                            ?><a href="/controlleur/controlAdmin.php" name="deconnexion">Déconnexion</a><?php
                        }
                        else
                        {
                            ?><a href="/controlleur/controlConnexion.php">Connexion</a><?php
                        }
                    ?>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->


    </div>
    <!-- /.container -->
</nav>