<?php

if(isset($_SESSION['auth'])){
    header('Location:index.php');

}

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

?>
<?php require_once 'headerLog.php';

?>
<?php require_once 'inc/functions.php'; ?>  <!-- Ajout des fonctions -->


<?php



if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
    require_once 'inc/db.php';
    require_once 'inc/functions.php';
    $verif = $db->queryBis('SELECT * FROM portfolio_users WHERE email = ?', [$_POST['email']]);
    if($verif == null){
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }elseif(password_verify($_POST['password'], $verif['password'])){
        $_SESSION['auth'] = $verif;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté !'. "<a href='index.php'> Cliquez ici pour revenir à l'acceuil</a> ";
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrect';
    }
}
?>