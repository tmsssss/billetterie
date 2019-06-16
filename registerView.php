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