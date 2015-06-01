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

        <!-- Affiche le formulaire avec le pseudo et le mot de passe pour que l'admin se connecte -->
        <h1>Connexion</h1>
        <div class="connexion">
                <form action="controlAdmin.php" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label for="pseudo" class="col-sm-2 control-label">Pseudo</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mdp" class="col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-2">
                      <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="connexion" class="btn btn-default">Connexion</button>
                    </div>
                  </div>
                </form>
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