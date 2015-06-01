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

        <?php 
            include(".././header/header.php");
            ?>
<body>

    <div class="container">
        <div class="nom-film">
        <?php 

            /* Affiche toutes les informations pour un film récupérer dans la base de données */
            foreach($resInfosFilms['films'] as $film)
            {
                echo $film['nom_film']; ?> <hr>
        </div>
                <div class="img-film">
                    <?php $src = 'http://infosfilms.olympe.in/photos/films/' . $film['lien_img_film']; ?>
                    <img src="<?php echo $src; ?>" class="img-responsive img-thumbnail" alt="Image Film">
                </div>
                <div class="infos-film">
                    <div class="date-sortie-film">
                        <div class="nom-categorie">Date de sortie:</div>
                    <?php
                            echo $film['date_sortie_film'];
                    ?> 
                    </div>
                    <div class="synopsis-film">
                        <div class="nom-categorie">Synopsis:</div>
                    <?php
                            echo $film['synopsis_film'];
                    ?>
                    </div>
                    <div class="duree-film">
                        <div class="nom-categorie">Durée du film (min):</div>
                    <?php
                            echo $film['duree_min_film'];
                    ?>
                    </div>
                    <div class="genre-film">
                        <div class="nom-categorie">Genre:</div>
                    <?php
                            echo $resGenreFilms['genre_film'][0][0];
                    ?>
                    </div>
                    <div class="realisateur-film">
                        <div class="nom-categorie">Réalisateur:</div>
                    <?php
                            //Recupere le nom et prenom de l'acteur, pour lui faire aller sur sa page de description
                            $nomRealisateur = $resRealisateurFilms['realisateur-film'][0][1];
                            $prenomRealisateur = $resRealisateurFilms['realisateur-film'][0][0];
                            echo "<a href='../controlleur/controlInfosRealisateurs.php?nomRealisateur=" . $nomRealisateur . "&prenomRealisateur=" . $prenomRealisateur . "'>" . $resRealisateurFilms['realisateur-film'][0][0] . ' ' . $resRealisateurFilms['realisateur-film'][0][1] . "</a>"
                    ?>
                    </div>
                </div>
        <?php
            }
        ?>

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