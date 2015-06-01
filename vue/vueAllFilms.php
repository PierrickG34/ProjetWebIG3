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
        <h2>Voici la liste des films qui commence par la lettre choisis:</h2>
        <p>(Cliquez dessus pour avoir des informations)</p>
        <div class="infos-all-films">
            <?php 
                /* Affiche la liste des films */
                foreach ($resInfosAllFilms['films'] as $resultats)
                {
                    if(isset ($resultats) && !empty($resultats))
                    {
                        echo "<a href='../controlleur/controlInfosFilms.php?nomFilm="
                            . $resultats['nom_film']
                            . "&idGenre="
                            . $resultats['id_genre']
                            . "&idRealisateur="
                            . $resultats['id_realisateur']
                            . "'>"
                            . $resultats['nom_film']
                            . "</a> <br>";
                    }
                }
                /* S'il n'existe pas de film pour cette lettre la, on luit dit */
                if($resultats == NULL)
                {
                    echo "Il n'existe aucun film correspondant à cette lettre.";
                }
                echo "<br><br><a href='controlFilms.php'>Retour a la selection</a>" ;
            ?>
        </div>

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