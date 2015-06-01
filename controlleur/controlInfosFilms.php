<?php
	include("../modele/films.php"); // Include le modele film pour aller chercher les donnees
	include("../modele/genres.php");
	include("../modele/realisateurs.php");
	include("../modele/admin.php");

	/* Si on a bien le parametre passer en GET*/
	if(isset($_GET['nomFilm']))
	{
		/* Récupere les valeurs passer en GET */
		$nomFilm = $_GET['nomFilm'];
	    $idGenre = $_GET['idGenre'];
	    $idRealisateur = $_GET['idRealisateur'];

	    /* Récuperer les valeurs du films pour les afficher */
	    $infosFilms = new Films("", "", "", "", "", "", "");
	    $resInfosFilms['films'] = $infosFilms->selectAllFilmsWhere($nomFilm);

	    /* Récuperer le genre d'un film  */
	    $genreFilms = new Genres($idGenre, "");
	    $resGenreFilms['genre_film'] = $genreFilms->selectNomGenre();

	    /* Récuperer le realisateur d'un film */
	    $nomRealisateurs = new Realisateurs($idRealisateur, "", "", "", "", "", "");
	    $resRealisateurFilms['realisateur-film'] = $nomRealisateurs->selectNomRealisateur();
	}
    else /* Si pas d'argument passer par GET, alors on redirige vers le choix des films */
    {
        header('Location: ../controlleur/controlFilms.php');    
    }

	$admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    require("../vue/vueInfosFilms.php");
?>