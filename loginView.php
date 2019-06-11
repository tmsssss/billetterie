
<div class="container">
    <?php if(isset($_SESSION['flash'])) : ?> <!-- Affichage des erreurs -->


        <?php foreach($_SESSION['flash'] as $type => $message); ?>
        <div class="alert alert-<?= $type; ?>" style="margin-top: 1%">

            <?= $message; ?>

        </div>


        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>
    <?php if(!isset($_SESSION['auth'])){ ?>
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Se connecter</h3>
                        </div>

                        <div style="padding-top: 13px" id="form">
                            <form action="" method="POST" id="form1">
                                <div class="wrap-input100 validate-input form-group" ">
                                <input class="input100" type="email" name="email" placeholder="Adresse mail" required>
                                <span class="symbol-input100"><i class="far fa-envelope"></i></span>
                        </div>
                        <div class="wrap-input100 validate-input form-group">
                            <input class="input100" type="password" name="password" placeholder="Mot de passe" required>
                            <span class="symbol-input100"><i class="fas fa-key"></i></i></span>
                        </div>
                        <div class="container-contact100-form-btn">
                            <button class="contact100-form-btn" type="submit">
                                S'inscrire
                            </button>
                        </div>

                    </div>

                    <?php }else{ ?>
                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">

                                <div class="col-md-7">
                                    <!-- Billing Details -->
                                    <div class="billing-details">
                                        <div class="section-title">
                                            <a href="index.php"><h3 class="title"> Retour a l'acceuil</h3> </a>
                                        </div>



        <?php
}?>

