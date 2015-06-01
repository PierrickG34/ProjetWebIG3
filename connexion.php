<?php
    // Connexion à la base de données
    try
    {	
        $bdd = new PDO('mysql:host=sql2.olympe.in;dbname=7wlzo6a0;charset=utf8', '', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }
?>