<?php
    include("../modele/realisateurs.php");
    include("../modele/admin.php");

    /* Recupere les donnees du formulaire */
    $prenomRealisateur = htmlspecialchars($_POST['prenomRealisateur']);
    $nomRealisateur = htmlspecialchars($_POST['nomRealisateur']);
    $natioRealisateur = htmlspecialchars($_POST['natioRealisateur']);
    $dateNaissRealisateur = htmlspecialchars($_POST['dateNaissRealisateur']);
    $lienImgRealisateur = $_FILES['lienImgRealisateur'];
    $ajoute = htmlspecialchars($_POST['ajoute']);
    $suppr = htmlspecialchars($_POST['suppr']);
    $idRealisateur= '';
    $nbFilms = '0'; 
    $prenomRealisateurSuppr = htmlspecialchars($_POST['prenomRealisateurSuppr']);
    $prenomRealisateurSuppr = explode("-", $prenomRealisateurSuppr);
            
    /* S'il a bien remplit tous les champs d'ajout */
    if(isset($ajoute) &&isset($prenomRealisateur) && !empty($prenomRealisateur) && isset($nomRealisateur) && !empty($nomRealisateur) && isset($natioRealisateur) && !empty($natioRealisateur) && isset($dateNaissRealisateur) && !empty($dateNaissRealisateur) && isset($lienImgRealisateur) && !empty($lienImgRealisateur))
    {   
        /* Genere un nom aléatoire pour les photos */
        $lienImgRealisateur['name'] = md5(time()) . "_" . $lienImgRealisateur['name'];
        $insertRealisateurs = new Realisateurs($idRealisateur, $prenomRealisateur, $nomRealisateur, $natioRealisateur, $dateNaissRealisateur, $nbFilms, $lienImgRealisateur['name']);
        $query = $insertRealisateurs->insertRealisateurs();
        
        if($query == 1) // Si la requete a fonctionner
        {
            $uploads_dir = '../photos/realisateurs/'; /* Définis le chemin */
            move_uploaded_file($lienImgRealisateur['tmp_name'], $uploads_dir.$lienImgRealisateur['name']); /* Récupére le fichier sur le serveur */
            $resAjout = "Vous avez bien rajouté l'acteur <div class='nom-realisateur-ajout'>'" . $prenomRealisateur . " " . $nomRealisateur . "'</div> dans la base de données.";
        }
        else // Sinon on lui dit
        {
            $resAjout = "Erreur lors de l'ajout dans la base de données.";
        }
    }
    /* Sinon s'il a remplit tous les champs de suppresion */
    else if(isset($suppr) && isset($prenomRealisateurSuppr[0]) && !empty($prenomRealisateurSuppr[0]))
    {
        $supprRealisateurs = new Realisateurs($idRealisateur, $prenomRealisateurSuppr[0], $nomRealisateur, $natioRealisateur, $dateNaissRealisateur, $nbFilms, $lienImgRealisateur);
        $query = $supprRealisateurs->supprRealisateurs();
        if($query == 1) // Si la requete a fonctionner
        {
            $resSuppr = "Vous avez bien supprimé l'acteur <div class='nom-realisateur-suppr'>'" . $prenomRealisateurSuppr[0] . "'</div> de la base de données.";
        }
        else // Sinon on lui dit
        {
            $resSuppr = "Erreur lors de la suppression dans la base de données.";
        }
    }


    /*Récuperation de tous les réalisateur pour l'afficher dans le formulaire d'ajout de film*/
    $realisateur = new Realisateurs("", "", "", "", "", "", "");
    $allRealisateurs = array();
    $allRealisateurs['realisateurs'] =  $realisateur->selectAllRealisateurs();

    /* Récupere les valeurs pour savoir si c'est un admin */
    $admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    require('../vue/vueRealisateurs.php');
        ?>