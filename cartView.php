<?php require 'header.php'; ?>

<?php  if(!isset($_SESSION['auth'])){

 ?>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <p class="title"> <a href="register.php"> Inscrivez vous </a> ou <a href="login.php"> Connectez-vous</a> pour reservez vos billets </p>
                    </div>

<?php }else{ ?>
    <!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-7">
                <!-- Billing Details -->
                <div class="billing-details">
                    <div class="section-title">
                        <h3 class="title">Adresse de facturation</h3>
                    </div>
                    <?php require_once('./config.php'); ?>

                    <form action="charge.php?total=<?= $total ?>" method="post" id="form1">
                        <div class="wrap-input100 validate-input form-group">
                            <input class="input100" type="text" name="firstName" placeholder="Prénom" required>
                            <span class="symbol-input100"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-input100 validate-input form-group">
                            <input class="input100" type="text" name="lastName" placeholder="Nom" required>
                            <span class="symbol-input100"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <div class="wrap-input100 validate-input form-group">
                            <input class="input100" type="text" name="city" placeholder="Ville" required>
                            <span class="symbol-input100"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="create-account">
                                <label for="create-account">
                                    <span></span>
                                    Un commentaire ?
                                </label>
                                <div class="caption ">
                                    <div class="order-notes">
                                        <textarea class="input" name="comment" placeholder="Order Notes"></textarea>
                                    </div>
                                </div>
                            </div>
                    </form>


                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="<?= $stripe['publishable_key']; ?>"
                        data-description="Yessai"
                        data-amount= '<?=
                        str_replace('.', '', $total) ?>'
                        data-currency="eur"
                        data-locale="fr">

                    </script>

                </div>
            </div>
            <!-- /Billing Details -->
            <!-- Order notes -->

            <!-- /Order notes -->
        </div>
        <!-- Order Details -->
        <div class="col-md-5 order-details">
            <div class="section-title text-center">
                <h3 class="title">Votre commande</h3>
            </div>
            <div class="order-summary">
                <div class="order-col">

                    <div><strong>PRODUIT</strong></div>
                    <div style="padding-left: 165px;"><strong>QUANTITE</strong></div>

                    <div><strong>TOTAL</strong></div>
                </div>
                <!-- Notre boite de vérification -->

                <?php
                foreach ($prices as $price):
                    foreach ($events as $event):
                        ?>
                        <div class="order-products">
                            <div class="order-col" style="font-size : 20px;">
                                <div><?= $event->name;?> <br> <span style="font-size:18px;"><?=$price->name
                                        ?></span></div>
                                <div>x<?=$_SESSION['panier'][$price->id]; ?></div>
                                <div><?=number_format($price->price, 2, ',', ' '); ?> € <a href="cart.php?delPanier=<?=$price->id ?>" class="far fa-times-circle"></a></div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                endforeach;
                if(isset($_POST['promo']) && $_POST['promo']  == 'SIO'){
                    ?>
                    <div style="font-size : 20px;">
                        <div> CODE PROMO : <?= '   ' .htmlspecialchars($_POST['promo']) ?> -<?= number_format($total * 0.20, 2) ?> €</div>
                    </div>


                <?php } ?>



                <div class="order-col">
                    <form class="contact100-form validate-form" id="form2" method="post">
                        <div class="wrap-input100 validate-input cart">
                            <input class="input100" type="text" name="promo" placeholder="Code promo" value="<?php if(isset($_POST['promo'])){echo $_POST['promo'];

                            }  ?>">
                            <span class="symbol-input100">
							<i class="fas fa-percentage" aria-hidden="true"></i>
						</span>
                        </div>

                        <div class="container-contact100-form-btn">
                            <button class="contact100-form-btn" type="submit" form="form2">
                                Valider
                            </button>
                        </div>
                    </form></strong></div>
                <div class="order-col">
                    <div><strong>TOTAL</strong></div>
                    <?php
                    $total = 0;
                    foreach ($prices as $price) {
                        $total += $price->price * $_SESSION['panier'][$price->id];
                    }
                    if(isset($_POST['promo']) && $_POST['promo'] == 'SIO') {
                        $total = $total - $total * 0.20;
                    }
                    ?>


                    <div><strong class="order-total"><?= number_format($total, 2, ',', ' '); ?> €</strong></div>
                </div>
            </div>
            <script>
                // Hide default stripe button, be careful there if you
                // have more than 1 button of that class
                document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
            </script>


            <button type="submit" class="primary-btn order-submit" form="form1" <?php if($_SESSION['panier'] == NULL){ ?> disabled  <?php } ?>>Commander</button>
        </div>
        <!-- /Order Details -->
    </div>
    <!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    Stripe.setPublishableKey('pk_live_yYPJCL4G9dpGbyJIxW3h8mes\n');
</script>


<?php require 'footer.php';
}  ?>

