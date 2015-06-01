<?php 
    /* Generation du token aleatoire */
    $token =  uniqid() . str_shuffle("abcdefghijklmnopqrstuvwxz0123456789") . time();
    
    include("../modele/admin.php"); // modele

    /* Recupere les donnees */
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp =  md5(htmlspecialchars($_POST['mdp'])); // Crypte le mot de passe en md5
    $connexion = htmlspecialchars($_POST['connexion']);
    $deconnexion = htmlspecialchars($_POST['deconnexion']);

    /* S'il a bien remplit tous les champs de connexion */    
    if(isset($connexion) && isset($pseudo) && !empty($pseudo) && isset($mdp) && !empty($mdp))
    {
        $selectAllAdmin = new Admin("", $pseudo, $mdp, "");
        $query = $selectAllAdmin->existe();
        $idAdmin = $query[0][0];
        if ($query)
        {
            /* On change le token generer dans la base de données pour l'identifier plus tard*/
            $changeToken = $selectAllAdmin->changeToken($token);
            if($changeToken)
            {
                setcookie("token", $token, 0);
                setcookie("id_admin", $idAdmin, 0);
                include ("../vue/index.php");
            }
        }
        else
        {
            /* S'il s'est tromper, il recommence */
            require("../controlleur/controlConnexion.php");
        }
    }
    /* S'il a cliquer sur deconnexion, on supprime les 2 cookies */
    else if(isset($deconnexion))
    {
        setcookie("token", "", time()-3600);
        setcookie("id_admin", "", time()-3600);
        include ("../vue/index.php");
    }

    //include ("../vue/index.php");
?>