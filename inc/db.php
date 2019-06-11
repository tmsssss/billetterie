<?php
try
{
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET lc_time_names = 'fr_FR'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $bdd = new PDO('mysql:host=localhost;portfo;charset=utf8', 'root', 'root', $options);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs

}
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

