<?php
	include("../modele/realisateurs.php");
	include("../modele/admin.php");
	
	/* Si on arrive sur la page avec les parametres */
	if(isset($_GET['nomRealisateur']) && isset($_GET['prenomRealisateur']))
	{
		/* Récupere les valeurs passer en GET */
		$nomRealisateur = $_GET['nomRealisateur'];
		$prenomRealisateur = $_GET['prenomRealisateur'];

		/* Récuperer les valeurs du realisateurs pour les afficher */
	    $infosRealisateurs = new Realisateurs("", $prenomRealisateur, $nomRealisateur, "", "", "", "");
	    $resInfosRealisateur['realisateurs'] = $infosRealisateurs->selectAllRealisateursWhere();
	}
	else /* Si pas d'argument passer par GET, alors on redirige vers le choix des réalisateurs */
	{
		header('Location: ../controlleur/controlRealisateurs.php');
	}

	/* Récupere les valeurs pour savoir si c'est un admin */
	$admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    
require("../vue/vueInfosRealisateurs.php");


?>