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
        <h1>Réalisateurs</h1>
        <?php 

        /* Permet d'afficher la confirmation si l'admin a ajouter ou supprmier un realisateur */
        if(!empty($resAjout))
        { ?>
        <div class="resultat">
                <div class="resultat-ajout-realisateur">
                        <?php
                            echo $resAjout . "<br><br>";
                        ?>
                </div>
            <?php 
            }
            if(!empty($resSuppr))
            { ?>
                <div class="resultat-suppr-realisateur">
                        <?php
                            echo $resSuppr . "<br><br>";
                        ?>
                </div>
        </div>
        <?php 
        } ?>
        <!-- Permet d'afficher la liste des lettres pour que l'utilisateur puisse selectionner -->
                <div class="initiale-realisateur">
            <?php
                foreach(range('a', 'z') as $lettre)
                {
                    echo "<a href='../controlleur/controlAllRealisateurs.php?premiereLettre=" . $lettre . "'>" .strtoupper($lettre) . "</a> &nbsp &nbsp";
                }
                echo "<br><br><a href='../controlleur/controlAllRealisateurs.php?premiereLettre=" . "tous" . "'>Tous les réalisateurs </a>";
            ?>
        </div>

        <?php 
        
        /* Si c'est l'admin, alors on lui affiche les formulaires d'ajout ou de suppresion */
        if(isset($_COOKIE["token"]) && ($_COOKIE["token"] == $allAdmin['admin'][0][0]))
        {   
        ?>
        <div class="ajout-realisateur">
            <h3>Ajout d'un réalisateur</h3>
            <form action="controlRealisateurs.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label form="prenomRealisateur" class="col-sm-2 control-label">Prenom réalisateur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prenomRealisateur" name="prenomRealisateur" placeholder="Prenom de votre realisateur" required>
                    </div>
                </div>
                <div class="form-group">
                    <label form="nomRealisateur" class="col-sm-2 control-label">Nom réalisateur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nomRealisateur" name="nomRealisateur" placeholder="Nom de votre realisateur" required>
                    </div>
                </div>
                 <div class="form-group">
                    <label form="natioRealisateur" class="col-sm-2 control-label">Nationalité réalisateur</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="natioRealisateur" name="natioRealisateur" placeholder="Nationalité de votre realisateur" required>
                    </div>
                </div>
                <div class="form-group">
                    <label form="dateNaissRealisateur" class="col-sm-2 control-label">Date de naissance du réalisateur</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="dateNaissRealisateur" name="dateNaissRealisateur" placeholder="Date de naissance de votre réalisateur" required>
                    </div>
                </div>
                <div class="form-group">
                    <label form="lienImgRealisateur" class="col-sm-2 control-label">Image du réalisateur</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="lienImgRealisateur" name="lienImgRealisateur" accept="image/*" required>
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="ajoute" class="btn btn-default">Valider</button>
                </div>
            </form>
        </div>
        <br><br>
        
        <div class="suppression-acteur">
            <h3>Suppression d'un réalisateur</h3>
            <form action="controlRealisateurs.php" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label form="prenomRealisateurSuppr" class="col-sm-2 control-label">Prénoms et noms des réalisateurs</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="prenomRealisateurSuppr" name="prenomRealisateurSuppr">
                            <?php
                                foreach ($allRealisateurs['realisateurs'] as $realisateur)
                                {
                                    echo '<option>' . $realisateur['prenom_realisateur'] . ' - ' .  $realisateur['nom_realisateur'] . '</option>';
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