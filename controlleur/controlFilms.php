<?php 
    include("../modele/films.php");
    include("../modele/genres.php"); // include le modele de genre pour récupérer les genres
    include("../modele/realisateurs.php"); // include le modele du realisateur pour recuperer les realisateurs
    include("../modele/admin.php");


    /* Recupere les donnees du formulaire */
    $nomFilm = htmlspecialchars($_POST['nomFilm']);
    $dateSortieFilm = htmlspecialchars($_POST['dateSortieFilm']);
    $synopsisFilm = htmlspecialchars($_POST['synopsisFilm']);
    $genre = htmlspecialchars(substr($_POST['genre'], 0, 3));
    $dureeFilm = htmlspecialchars($_POST['dureeFilm']);
    $lienImg = $_FILES['lienImg'];
    $nomFilmSuppr = htmlspecialchars($_POST['nomFilmSuppr']);
    $idRealisateur = htmlspecialchars($_POST['realisateur']);
    $ajoute = htmlspecialchars($_POST['ajoute']);
    $suppr = htmlspecialchars($_POST['suppr']);


    /*S'il a bien remplis tous les champs d'ajout */ 
    if(isset($ajoute) && isset($nomFilm) && !empty($nomFilm) && isset($dateSortieFilm) && !empty($dateSortieFilm) && isset($synopsisFilm) && !empty($synopsisFilm) && isset($genre) && !empty($genre) && isset($lienImg) && !empty($lienImg) && isset($dureeFilm) && !empty($dureeFilm) && isset($idRealisateur) && !empty($idRealisateur))
    {
        /* Genere un nom aléatoire pour la photo */
        $lienImg['name'] = md5(time()) . "_" . $lienImg['name'];
        $insertFilms = new Films($nomFilm, $dateSortieFilm, $synopsisFilm, $genre, $lienImg['name'], $dureeFilm, $idRealisateur);        
        $query = $insertFilms->insertFilms();
        if($query == 1) // Si la requete a fonctionner
        {
            $uploads_dir = '../photos/films/';
            move_uploaded_file($lienImg['tmp_name'], $uploads_dir.$lienImg['name']); /* Deplace la photos sur le serveur*/
            $resAjout = "Vous avez bien rajouté le film '" . $nomFilm . "' a la base de données. Merci!";

            /* On augmente le nombre de film du realisateur en question
            --> Pas besoin de le gérer à la main, les triggers marchent en ligne
            $augmenteNbFilm = new Realisateurs($idRealisateur, "", "", "", "", "", "");
            $query1 = $augmenteNbFilm->augmenteNbFilm(); */
        }
        else // Sinon on lui dit
        {
            $resAjout = "Erreur lors de l'ajout dans la base de données.";
        }
    }
    /* S'il a bien remplis tous les champs de suppression */
    else if(isset($suppr) && isset($nomFilmSuppr) && !empty($nomFilmSuppr))
    {
        $delFilms = new Films($nomFilmSuppr, $dateSortieFilm, $synopsisFilm, $genre, $lienImg, $dureeFilm, $idRealisateur);        
        $query = $delFilms->supprFilms();
        if($query == 1) // Si la requete a fonctionner
        {

            $resSuppr = "Vous avez bien supprimé le film '" . $nomFilmSuppr . "', merci!";

            /* On diminue le nombre de film du realisateur en question
            --> Pas besoin de le gérer à la main, les triggers marchent en ligne
            $diminueNbFilm = new Realisateurs($idRealisateur, "", "", "", "", "", "");
            $query1 = $diminueNbFilm->diminueNbFilm();*/
        }
        else // Sinon on lui dit
        {
            $resSuppr = "Erreur lors de la suppression dans la base de données.";
        }
    }

    /* Récuperation de tous les genres pour l'afficher dans le formulaire d'ajout de film*/
    $genre = new Genres("","");
    $allGenres = array();
    $allGenres['genres'] = $genre->selectAllGenres();

    /*Récuperation de tous les réalisateur pour l'afficher dans le formulaire d'ajout de film*/
    $realisateur = new Realisateurs("", "", "", "", "", "", "");
    $allRealisateurs = array();
    $allRealisateurs['realisateurs'] =  $realisateur->selectAllRealisateurs();

    /*Récuperation de tous les réalisateur pour l'afficher dans le formulaire d'ajout de film*/
    $film = new Films("", "", "", "", "", "", "");
    $allFilms = array();
    $allFilms['films'] = $film->selectAllFilms();

    $admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    

    require("../vue/vueFilms.php");
?>