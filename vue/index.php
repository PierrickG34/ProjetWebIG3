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
    <?php 
        include(".././header/header.php");
    ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bienvenue sur Infos Films !</h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">
            <div class="img-accueil">
                    <img src="../photos/logoaccueil.png" class="img-responsive" alt="image accueil">
            </div>
            <div class="presentation">
                <p>Vous êtes à la recherche d’informations sur un film ou bien un acteur ?<br>
                   Vous vous êtes déjà posé la question: 
                   <div class="ita">« Quel a été le réalisateur du film ? »<br>
                    « De quoi parle se film/quel est sont résumé ? »</div> ou bien encore<br>
                    <div class="ita">« Quel est le titre exact du film ? »</div><br><br>
                   <p>Si c’est le cas, alors n’hésitez plus; ce site est fait pour vous ! Vous y trouverez toutes les informations utiles pour votre recherche</p>
            </div>

        </div>
        <!-- /.row -->

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