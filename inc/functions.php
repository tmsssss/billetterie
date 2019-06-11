<?php
require_once 'db.php';
function debug($variable){

    echo '<pre>'. print_r ($variable, true) . '</pre>';


}

function str_random($lenght){

    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPMLKJHGFDSQWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $lenght)),0, $lenght);



}

function logged_only(){
    if(session_status() == PHP_SESSION_NONE){

        session_start();

    }

    if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder a cette page.";
        header('Location: login.php');
        exit();



    }








}
//
function getArticles(){

    require_once 'db.php';
    $req = $bdd -> prepare('SELECT id, title FROM articles ORDER BY id DESC');
    $req ->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req ->closecursor();



}
