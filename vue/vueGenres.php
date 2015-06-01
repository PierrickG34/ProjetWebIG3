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
        <h1>Genres</h1>

        <?php 
        /* Permet d'afficher la confirmation si l'admin a ajouter ou supprmier un realisateur */
        if(!empty($resAjout))
        { ?>
        <div class="resultat">
            <div class="resultat-ajout-genre">
                <?php
                    echo $resAjout . "<br><br>";
                ?>
            </div>
        <?php 
        }
        if(!empty($resSuppr))
        { ?>
            <div class="resultat-suppr-genre">
                <?php
                    echo $resSuppr . "<br><br>";
                ?>
            </div>
        </div>
        <?php 
        }
         ?>

        <?php 
        /* Si c'est l'admin, alors on lui affiche les formulaires d'ajout ou de suppresion */
        if(isset($_COOKIE["token"]) && ($_COOKIE["token"] == $allAdmin['admin'][0][0]))
        {
        ?>
        <div class="ajout-genre">
            <h3>Ajout d'un genre</h3>
                <form action="controlGenres.php" method="post" class="form-horizontal">
                  <div class="form-group">
                    <label for="lib_genre" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lib_genre" name="lib_genre" placeholder="Genre" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="ajoute" class="btn btn-default">Valider</button>
                    </div>
                  </div>
                </form>
        </div>
        <br><br>
        <div class="suppression-genre">
            <h3>Suppression d'un genre</h3>
            <form action="controlGenres.php" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label form="genre" class="col-sm-2 control-label">Genre</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="genre" name="genre">
                            <?php 
                                foreach ($allGenres['genres'] as $genre)
                                {
                                    echo '<option>' . $genre['id_genre'] . ' - ' .  $genre['lib_genre'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit"  name="suppr" class="btn btn-default">Valider</button>
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