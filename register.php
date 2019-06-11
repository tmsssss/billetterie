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
    /*
    $bdd = new PDO('mysql:host=localhost;portfo;charset=utf8', 'root', 'root', $options);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs  /*Connexion a la base de données */
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
        }catch (Exception $events){
            $events->getMessage();
        }
        if ( $req === false ){
           echo "bonjour";
        }else{
            echo"bonne nuit";
        }

        $user_id = $db->lastInsertId(); /* Collecte du dernier id inséré dans la bdd */

    }
}

?>
<!--   <a href="https://www.google.com/recaptcha/api/siteverify?secret=your_secret&response=response_string&remoteip=user_ip_address"></a> -->


<!-- Sign in Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">S'inscrire</h3>
                    </div>
                    <?php require_once('./config.php');
                    ?>
                    <?php $events = $db->query('SELECT * FROM portfolio_users WHERE id=87');
                            foreach ($events as $event){
                                echo $event->email;

                            }

                    ?>
                    <?php if (!empty($errors)): ?> <!-- Affichage des erreurs -->

                        <div class='alert alert-danger'  >

                            <p >Vous n'avez pas rempli le formulaire correctement.</p>
                            <ul>
                                <?php foreach ($errors as $error): ?>

                                    <li><?=$error; ?></li>

                                <?php
                                endforeach; ?>
                            </ul>
                        </div>

                    <?php
                    endif; ?>
                    <div style="padding-top: 13px" id="form">
                                <form action="" method="post" id="form1">
                                    <div class="wrap-input100 validate-input form-group" ">
                                    <input class="input100" type="email" name="email" placeholder="Adresse mail" required>
                                    <span class="symbol-input100"><i class="far fa-envelope"></i></span>
                            </div>
                            <div class="wrap-input100 validate-input form-group">
                                <input class="input100" type="password" name="password" placeholder="Mot de passe" required>
                                <span class="symbol-input100"><i class="fas fa-key"></i></i></span>
                            </div>
                            <div class="wrap-input100 validate-input form-group">
                                <input class="input100" type="password" name="password_confirm" placeholder="Confirmation mot de passe" required>
                                <span class="symbol-input100"><i class="fas fa-key"></i></i></span>
                            </div>
                            <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn" type="submit">
                                    S'inscrire
                        </button>
                    </div>

                    </div>

<section id="signup"  class="signup-section text-left" style="padding-top: 3rem;">
    <div class="container" >
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1  class="text-white mb-4" style="margin-left=-8%; ">S'inscrire</h1>
                <hr class="lines">
            </div>
        </div>
    </div>
</section>


