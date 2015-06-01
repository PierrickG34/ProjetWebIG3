<?php 
    //include("genres.php"); // modele
    include("../modele/films.php"); // Include le film pour recherche par films
    include("../modele/genres.php"); // Include le genre pour recherche par genres
    include("../modele/realisateurs.php"); // Include le realisater pour recherche par realisateurs
    include("../modele/admin.php");
    

    $recherche = htmlspecialchars($_POST['recherche']); // Recupere le champ saisi par l'utilisateur.
    $rechercheBy = htmlspecialchars($_POST['rechercheBy']); // Recupuere par quoi il veut rechercher.
    $rechercheByActeurs = htmlspecialchars($_POST['coche']); // Recupuere par quoi il veut rechercher si c'est un acteur.

    /* S'il a bien cliquer sur le bouton recherche */
    if(isset($recherche) && !empty($recherche))
    {
        /* S'il veut rechercher par films */
        if(isset($rechercheBy)  && $rechercheBy == "Films")
        {
            $rechercheByFilms = new Films("", "", "", "", "", "", "");
            $resRechercheByFilms['films'] = $rechercheByFilms->rechercheByFilms($recherche);
        }
        /* S'il veut recherhcer par genres */
        else if (isset($rechercheBy)  && $rechercheBy == "Genres") // S'il a selectionne et que cette selection est par "Genres"
        {
            $rechercheByGenres = new Genres("","");
            $resRechercheByGenres['genres'] = $rechercheByGenres->rechercheByGenres($recherche);
        }
        /* S'il veut rechercher par acteurs */
        else  if(isset($rechercheBy)  && $rechercheBy == "Acteurs") // S'il a selectionne et que cette selection est par "Realisateurs"
        {
            if(isset($rechercheByActeurs) && $rechercheByActeurs == "Prenoms") // Et qu'il a bien selectionner qu'il voulait chercher par prenom
                {
                    $rechercheByRealisateurPrenoms = new Realisateurs("", "", "", "", "", "", "");
                    $resRechercheByRealisateurPrenoms['acteursPrenoms'] = $rechercheByRealisateurPrenoms->rechercheByRealisateurPrenoms($recherche);
                }
                else if(isset($rechercheByActeurs) && $rechercheByActeurs == "Noms") // Et qu'il a bien selectionner qu'il voulait chercher par nom
                {

                    $rechercheByRealisateurNoms = new Realisateurs("", "", "", "", "", "", "");
                    $resRechercheByRealisateurNoms['acteursNoms'] = $rechercheByRealisateurNoms->rechercheByRealisateurNoms($recherche);
                }
        }
    }

    /* Récupérer les inforamtions pour savoir si la personne connecter est un admin ou pas */ 
    $admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    
    require ('../vue/vueRecherches.php');
?>