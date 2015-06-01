<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InfosFilms</title>
    <!-- Infos Séries - Base de données de séries -->

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/portfolio-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- header -->
    <?php 
        include(".././header/header.php");
    ?>

    <div class="container">
        <h1>Films</h1>
        <?php 

        /* Permet d'afficher la confirmation si l'admin a ajouter ou supprmier un realisateur */
        if(!empty($resAjout))
        { ?>
        <div class="resultat">
                <div class="resultat-ajout-film">
                        <?php
                            echo $resAjout . "<br><br>";
                        ?>
                </div>
            <?php 
            }
            if(!empty($resSuppr))
            { ?>
                <div class="resultat-suppr-film">
                        <?php
                            echo $resSuppr . "<br><br>";
                        ?>
                </div>
        </div>
        <?php 
        } ?>

        <!-- Permet d'afficher la liste des lettres pour que l'utilisateur puisse selectionner -->
        <div class="initiale-film">
            <?php
                foreach(range('a', 'z') as $lettre)
                {
                    echo "<a href='../controlleur/controlAllFilms.php?premiereLettre=" . $lettre . "'>" .strtoupper($lettre) . "</a> &nbsp &nbsp";
                }
                echo "<br><br><a href='../controlleur/controlAllFilms.php?premiereLettre=" . "tous" . "'>Tous les films </a>";
            ?>
        </div>
        
        <?php
        /* Si c'est l'admin, alors on lui affiche les formulaires d'ajout ou de suppresion */ 
        if(isset($_COOKIE["token"]) && ($_COOKIE["token"] == $allAdmin['admin'][0][0]))
        {   
        ?>
        <div class="ajout-film">
            <h3>Ajout d'un film</h3>
            <form action="controlFilms.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label form="nomFilm" class="col-sm-2 control-label">Nom du film</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomFilm" name="nomFilm" placeholder="Nom de votre film" >
                    </div>
                </div>
                <div class="form-group">
                    <label form="dateSortieFilm" class="col-sm-2 control-label">Date de sortie du film</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="dateSortieFilm" name="dateSortieFilm" placeholder="Date de sortie du film" >
                    </div>
                </div>
                <div class="form-group">
                    <label form="synopsisFilm" class="col-sm-2 control-label">Synopsis</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="synopsisFilm" name="synopsisFilm" rows="3" placeholder="Synopsis de votre film" ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label form="genre" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="genre" name="genre">
                            <?php // Affiche chaque genre dans un <select> différent.
                                foreach ($allGenres['genres'] as $genre)
                                {
                                    echo '<option>' . $genre['id_genre'] . ' - ' .  $genre['lib_genre'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label form="realisateur" class="col-sm-2 control-label">Réalisateur</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="realisateur" name="realisateur">
                            <?php // Affiche chaque réalisateur dans un <select> différent.
                                foreach ($allRealisateurs['realisateurs'] as $realisateur)
                                {
                                    echo '<option>' . $realisateur['id_realisateur'] . ' - ' .  $realisateur['prenom_realisateur'] . ' ' . $realisateur['nom_realisateur'] .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label form="dureeFilm" class="col-sm-2 control-label">Durée du Film</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="dureeFilm" name="dureeFilm" rows="3" placeholder="Duree du film (en minute)" ></input>
                    </div>
                </div>
                <div class="form-group">
                    <label form="lienImg" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="lienImg" name="lienImg" accept="image/*" >
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="ajoute" class="btn btn-default">Valider</button>
                </div>
            </form>
        </div>
        <br><br>
        <div class="suppression-film">
            <h3>Suppression d'un film</h3>
            <form action="controlFilms.php" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label form="nomFilmSuppr" class="col-sm-2 control-label">Noms des films</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="nomFilmSuppr" name="nomFilmSuppr">
                            <?php // Affiche chaque film dans un <select> différent.
                                foreach ($allFilms['films'] as $films)
                                {
                                    echo '<option>' . $films['nom_film'] .'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="suppr" class="btn btn-default">Valider</button>
                </div>
            </form>
        </div>
        <?php } ?>


        <!-- Footer -->
        <?php
            include(".././footer/footer.php");
        ?>
    </div>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>