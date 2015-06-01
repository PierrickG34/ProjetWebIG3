<?php 
    include("../modele/admin.php");

    /* Récupére les valeurs savoir si c'est un admin */
    $admin = new Admin($_COOKIE['id_admin'], "", "", "");
    $allAdmin = array();
    $allAdmin['admin'] = $admin->recupereTokenById();

    require ('../vue/index.php');
?>