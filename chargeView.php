<?php require 'headerBis.php'; ?>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3">
            <br><br> <h2 style="color:#0fad00">Commande n°<?= $command ?> enregistrée !</h2>
            <h3>Merci <?= htmlspecialchars($_POST['firstName']) ?>  <?= htmlspecialchars($_POST['lastName']) ?> ! </h3>
            <h4 style="color:#ff6f69; line-height:1.4;"><strong>Confirmation de commande envoyée à <br><?= $mail ?> ! </strong></h4>
            <?php foreach ($events as $event): ?>

            <br><br>
        </div>

    </div>
</div>
<?php
endforeach;
?>
<!-- Product details -->
<div class="product-details" style="padding:35px">
    <div class="add-to-cart">
        <h2 style="margin-top: 15px;">Recapitulatif de commande :</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th style="font-size: 16px;">Billets</th>
                    <th>Quantité</th>
                    <th></th>
                    <th style="padding-left: 370px; font-size: 16px;"">Tarif</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>



                <!-- tab1  -->
                <?php

                foreach ($prices as $price): ?>
                    <tr>
                        <td style="font-size: 20px;"><?=$event->name
                            ?> <span style="font-size:16px;"><?=str_replace('Early -', '', $price->name) ?></span></td>
                        <td style="padding-left:25px">x<?= $quantity[$price->id] ?></td>
                        <td></td>
                        <td style="padding-left: 370px; font-size: 16px;"><?=number_format($price->price, 2, ',', ' '); ?> € </td>
                        <td></td>
                    </tr>

                <?php

                endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<h1 style="padding-left:1525px"> TOTAL : <?=$_GET['total'] ?> €</h1>



<?php require 'footer.php'; ?>
