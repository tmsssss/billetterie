<?php if(session_status() == PHP_SESSION_NONE){
    session_start();
}

?>
<?php if (isset($_SESSION['auth']))
{

    header('Location: index.php');
    exit();

} ?>
<?php require_once 'headerLog.php';

?>
<?php require_once 'inc/functions.php'; ?>  <!-- Ajout des fonctions -->


<?php

if (!empty($_POST))
{ /* Si tout les formulaires sont remplis */

    $errors = array(); // Creation tableau d'erreur


    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))

    {
        $errors['email'] = "Votre email n'est pas valide";
    }
    else
    {


        $mails = $db->queryBis('SELECT id FROM portfolio_users WHERE email = ?', [$_POST['email']]);




        if ($mails)
        {
            $errors['email'] = "Cet email est deja utilisé";
        }



    }

    if (empty($_POST['password']))
    {
        $errors['password'] = "Votre mot de passe n'est pas valide";
    }elseif ($_POST['password'] != $_POST['password_confirm']){
        $errors['password_confirm'] = "Les mots de passes ne sont pas identiques";

    }

    if (empty($errors))
    { /* S'il n'y a pas d'erreurs enregistrement dans la base de données */

        $mail = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); /* Cryptage du mot de passe */
        try{
            $req = $db->query('INSERT INTO portfolio_users(email, password) VALUES (:email,:password)', array(
                'email' => $mail,
                'password' => $password

            ));
            $_SESSION['flash']['success'] = "Votre compte a été crée";

        }catch (Exception $events){
            $events->getMessage();
        }

        $user_id = $db->lastInsertId(); /* Collecte du dernier id inséré dans la bdd */

    }
}

?>