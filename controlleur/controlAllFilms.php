<?php 
    include("../modele/films.php");
    include("../modele/admin.php");

    /* Recupere la premiere lettre pour faire la requete SQL en fonction */
    $premiereLettre = htmlspecialchars($_GET['premiereLettre']);
 
    /* S'il y a bien le parametre en GET */
    if(isset($premiereLettre) && !empty($premiereLettre))
    {
        $infosAllFilms = new Films("", "", "", "", "", "", "");
        if($premiereLettre == "tous")
        {
            $resInfosAllFilms['films'] = $infosAllFilms->selectAllFilms();
        }
        else
        { 
            $resInfosAllFilms['films'] = $infosAllFilms->orderFilmsByFirstLetter($premiereLettre);
        }
    }	
    else /* Si pas d'argument passer par GET, alors on redirige vers le choix des films */
    {
        header('Location: ../controlleur/controlFilms.php');    
    }

    $admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    require("../vue/vueAllFilms.php");
?>