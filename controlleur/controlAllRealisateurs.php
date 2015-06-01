<?php 
    include("../modele/realisateurs.php");
    include("../modele/admin.php");

    /* Recupere la premiere lettre pour faire la requete SQL en fonction*/
    $premiereLettre = htmlspecialchars($_GET['premiereLettre']);
 
    /* S'il  a bien le parametre alors on le fait*/
    if(isset($premiereLettre) && !empty($premiereLettre))
    {
        $infosAllRealisateurs = new Realisateurs("", "", "", "", "", "", "");
        /* Si on a choisit tous les realisateurs */
        if($premiereLettre == "tous")
        {
            $resInfosAllRealisateurs['realisateurs'] = $infosAllRealisateurs->selectAllRealisateurs();
        }
        /* Si on a choisis qu'une initiale */
        else
        { 
            $resInfosAllRealisateurs['realisateurs'] = $infosAllRealisateurs->orderRealisateursByFirstLetter($premiereLettre);
        }
    }	
    else /* Si pas d'argument passer par GET, alors on redirige vers le choix des réalisateurs */
    {
        header('Location: ../controlleur/controlRealisateurs.php');
    }
    
    $admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    require("../vue/vueAllRealisateurs.php");
?>