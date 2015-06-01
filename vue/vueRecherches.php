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
        <h1>Recherche</h1>
        <p>Par quoi voulez-vous recherchez ?</p>
            <!-- Formulaire de recherche savoir par quoi l'utilisateur veut rechercher. -->
            <form action="controlRecherches.php" method="POST" class="form-horizontal">
                <div class="radio-inline"> <!-- choix de la recherche-->
                    <label class="radio-inline">
                      <input type="radio" name="rechercheBy" id="byFilms" value="Films"> Films
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="rechercheBy" id="byGenres" value="Genres"> Genres
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="rechercheBy" id="byActeurs" value="Acteurs" onClick="parquoi();"> Realisateur
                    </label>
                    <p id="champ_cache" class="radio-inline"> <!-- si réalisateur, alors par prenoms ou noms ? -->
                        <input type="radio" name="coche" value="Prenoms"> Prenoms
                        <br>
                        <input type="radio" name="coche" value="Noms"> Noms
                    </p>
                </div><br><br>
                <div class="form-group">
                    <label form="recheche" class="col-sm-2 control-label" >Recherche: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="recherche" placeholder="Votre recherche">
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Valider</button>
                </div>
            </form>
            <br><br><br><br>

        <?php 
        /* Affichage des valeurs récupérer par le controlleur lors de la demande */

        /* Si c'est par un film */
        if (isset($resRechercheByFilms['films']) && !empty($resRechercheByFilms['films']))
        {
        ?>
            <table class="rech-film table table-bordered">
                <tr>
                    <th>Nom du film</th>
                    <th>Durée du film (minute)</th>
                    <th>Date de Sortie</th>
                    <th>Synopsis</th>
                </tr>
                <?php
                    echo 'Veuillez cliquer sur le film pour avoir plus d\'informations sur celui-ci.';
                    foreach ($resRechercheByFilms['films'] as $byFilms)
                    {
                    ?>
                    <tr> 
                        <!-- Permet de cliquer pour aller directement sur le film en question -->
                        <?php echo "<td><a href='../controlleur/controlInfosFilms.php?nomFilm="
                        . $byFilms['nom_film']
                        . "&idGenre="
                        . $byFilms['id_genre']
                        . "&idRealisateur="
                        . $byFilms['id_realisateur']
                        . "'>"
                        . $byFilms['nom_film'] . "</a></td>"; ?>
                         <td> <?php echo $byFilms['duree_min_film']; ?> </td>
                         <td> <?php echo $byFilms['date_sortie_film']; ?> </td>
                         <td> <?php echo $byFilms['synopsis_film']; ?> </td>
                    </tr>
                    <?php
                    }
                ?>
            </table>
        <?php
        }

        /* Si c'est par un genre */
        else if (isset($resRechercheByGenres['genres']) && !empty($resRechercheByGenres['genres']))
        {
        ?>
        <table class="rech-genres table table-bordered">
            <tr>
                <th>Genre</th>
            </tr>
            <?php
                foreach ($resRechercheByGenres['genres'] as $byGenres)
                {
                ?>
                <tr>
                     <td> <?php echo $byGenres['lib_genre']; ?> </td>
                </tr>
                <?php
                }
            ?>
        </table>
        <?php
        }

        /* Si c'est par un realisateur */
        else if(isset($resRechercheByRealisateurPrenoms['acteursPrenoms']) && !empty($resRechercheByRealisateurPrenoms['acteursPrenoms']))
        {
        ?>
        <table class="rech-realisateur-prenom table table-bordered">
            <tr>
                <th>Prenom - Nom</th>
                <th>Nationalité</th>
                <th>Date naissance</th>
            </tr>
            <?php
                foreach ($resRechercheByRealisateurPrenoms['acteursPrenoms'] as $byRealisateurPrenoms)
                {
                ?>
                <tr>
                    <?php echo "<td><a href='../controlleur/controlInfosRealisateurs.php?nomRealisateur=" . $byRealisateurPrenoms['nom_realisateur'] . "&prenomRealisateur=" . $byRealisateurPrenoms['prenom_realisateur'] . "'>" . $byRealisateurPrenoms['prenom_realisateur'] . ' ' . $byRealisateurPrenoms['nom_realisateur'] . "</a></td>" ?>
                     <td> <?php echo $byRealisateurPrenoms['natio_realisateur']; ?> </td>
                     <td> <?php echo $byRealisateurPrenoms['date_naiss_realisateur']; ?> </td>
                </tr>
                <?php
                }
            ?>
        </table>
        <?php
        }
        else if(isset($resRechercheByRealisateurNoms['acteursNoms']) && !empty($resRechercheByRealisateurNoms['acteursNoms']))
        {
        ?>
        <table class="rech-realisateur-nom table table-bordered">
            <tr>
                <th>Prenom - Nom</th>
                <th>Nationalité</th>
                <th>Date naissance</th>
            </tr>
            <?php
                foreach ($resRechercheByRealisateurNoms['acteursNoms'] as $byRealisateurNoms)
                {
                ?>
                <tr>
                    <?php echo "<td><a href='../controlleur/controlInfosRealisateurs.php?nomRealisateur=" . $byRealisateurNoms['nom_realisateur'] . "&prenomRealisateur=" . $byRealisateurNoms['prenom_realisateur'] . "'>" . $byRealisateurNoms['prenom_realisateur'] . ' ' . $byRealisateurNoms['nom_realisateur'] . "</a></td>" ?>
                     <td> <?php echo $byRealisateurNoms['natio_realisateur']; ?> </td>
                     <td> <?php echo $byRealisateurNoms['date_naiss_realisateur']; ?> </td>
                </tr>
                <?php
                }
            ?>
        </table>
        <?php
        }
        ?> 

        <!-- Footer -->
        <?php
            include(".././footer/footer.php");
        ?>
    </div>


    <!-- Javascript -->
    <!-- Permet de faire apparaitre les boutons "prenoms" et "noms" lors de la recherche par réalisateur -->
    <script type="text/javascript">
    document.getElementById("champ_cache").style.display = "none"; // On les affiches pas au debut
     
    function parquoi()
    {
            document.getElementById("champ_cache").style.display = "block";  // On les affiches que si on clique sur "acteurs"
    }

    </script>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>