<?php 
    include("../modele/genres.php"); // modele
    include("../modele/admin.php");

    /* Recupere les donnees */
    $lib_genre = htmlspecialchars($_POST['lib_genre']);
    $ajoute = htmlspecialchars($_POST['ajoute']);
    $suppr = htmlspecialchars($_POST['suppr']);
    $id_genre = htmlspecialchars(substr($_POST['genre'], 0, 3));
    /*Recupere le nom du genre a supprimer */
    $nomGenre = htmlspecialchars(strrev($_POST['genre']));
    $nomGenre = split(" ", $nomGenre);
    $nomGenre = strrev($nomGenre[0]);
    
    /* S'il a bien specier tous les champs d'ajout*/
    if(isset($ajoute) && isset($lib_genre) && !empty($lib_genre))
    { 
            $insertGenres = new Genres($id_genre, $lib_genre);
            $query = $insertGenres->insertGenres();
            
            if($query == 1) // Si la requete a fonctionner
            {
                $resAjout = "Vous avez bien rajouté le genre <div class='nom-genre-ajout'>'" . $lib_genre . "'</div> a la base de données.";
            }
            else // Sinon on lui dit
            {
                $resAjout = "Erreur lors de l'ajout dans la base de données.";
            }
    }
    /* Sinon s'il a bien specifier tous les champs pour la suppression */
    else if(isset($suppr) && isset($id_genre) && !empty($id_genre))
    {
            $deleteGenre = new Genres($id_genre, $lib_genre);
            $query = $deleteGenre->supprGenres();
            if($query == 1) // Si la requete a fonctionner
            {
                $resSuppr = "Vous avez bien supprimé le genre <div class='nom-genre-suppr'>'" . $nomGenre . "'</div> de la base de données.";
            }
            else // Sinon on lui dit
            {
                $resSuppr = "Erreur lors de la suppression dans la base de données.";
            }
    }

    /* Récupere tous les genrs */
    $genre = new Genres("","");
    $allGenres = array();
    $allGenres['genres'] = $genre->selectAllGenres();

    /* Récupere les inforamtions savoir si c'est un admin */
    $admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    require ('../vue/vueGenres.php');
?>