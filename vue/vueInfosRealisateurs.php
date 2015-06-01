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
        <!-- Permet d'afficher toutes les informations récupérer dans la base de données pour le réalisateur en question -->
        <div class="prenom-nom-realisateur">
        <?php 
            foreach($resInfosRealisateur['realisateurs'] as $realisateur)
            {
                echo $realisateur['prenom_realisateur'] . ' ' . $realisateur['nom_realisateur']; ?> <hr>
        </div>
                <div class="img-realisateur">
                    <?php $src = 'http://infosfilms.olympe.in/photos/realisateurs/' . $realisateur['lien_img_realisateur']; ?>
                    <img src="<?php echo $src; ?>" class="img-responsive img-thumbnail" alt="Image Realisateur">
                </div>
                <div class="infos-realisateur">
                    <div class="natio-realisateur"><div class="nom-categorie">Nationalité du réalisateur:</div>
                <?php
                    echo $realisateur['natio_realisateur'];
                ?>
                    </div>
                    <div class="date-naiss-realisateur"><div class="nom-categorie">Date de naissance du réalisateur:</div>
                <?php
                    echo $realisateur['date_naiss_realisateur'];
                ?>
                    </div>
                    <div class="nb-film"><div class="nom-categorie">Nombre de films réalisés:</div>
                <?php
                    echo $realisateur['nb_films'];
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