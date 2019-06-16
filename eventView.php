<?php require 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap-grid.css">
<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <?php

        if(!$events){ ?>
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-6 col-sm-offset-3">
                        <br><br> <h2 style="color:red">Evenement non existant</h2>

                        <br><br>
                    </div>

                </div>
            </div>
            <?php
        }else{
        foreach ($events as $event):

        ?>
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="./img/<?= $event->id ?>_0.png" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="./img/<?= $event->id ?>_1.png" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="./img/<?= $event->id ?>_2.png" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="./img/<?= $event->id ?>_3.png" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->
            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="./img/<?= $event->id ?>_0.png" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="./img/<?= $event->id ?>_1.png" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="./img/<?= $event->id ?>_2.png" alt="">
                    </div>
                    <div class="product-preview">
                        <img src="./img/<?= $event->id ?>_3.png" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->
            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?= $event->name; ?></h2>
                    <div>
                    </div>
                    <div>
                    </div>
                    <p><?= $event->content ?></p>
                </div>
            </div>
        </div>
        <!-- Product details -->
        <div class="product-details">
            <div class="add-to-cart">
                <h2 style="margin-top: 15px;">Billetterie</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th style="font-size: 16px;">Billets</th>
                            <th></th>
                            <th style="padding-left: 370px; font-size: 16px;"">Tarif</th>
                            <th style="padding-left:35px">Quantité</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- tab1  -->
                        <?php

                        foreach ($prices as $price): ?>
                        <form method="post">
                            <tr>
                                <td style="font-size: 16px;"><?= $price->name ?></td>
                                <td></td>
                                <td style="padding-left: 370px; font-size: 16px;"><?=number_format($price->price, 2, ',', ' '); ?> € </td>
                                <td>
                                    <button type="button" id="sub" class="sub btn btn-outline-success"><i class="fas fa-minus"></i></button>
                                    <input class="input-group-field quantity" id="qty_input" type="number" min="0" name="panier[quantity][<?= $price->id; ?>]" value="<?php if(isset($_SESSION['panier'][$price->id])){echo $_SESSION['panier'][$price->id];}
                                    ?>">
                                    <button type="button" id="add" class="add btn btn-outline-success"><i class="fas fa-plus"></i></button>
                </div>
                </td>
                <td></td>
                <?php



                endforeach;
                ?>
                 <!-- EXAM -->
                <table style="font-size: 18px">

                <tr>
                    <th scope="col">Type </th>
                    <th scope="col"> Prix Moyen</th>
                </tr>
                <?php
                $types = getAveragePrice();
                foreach ($types as $type){?>
                <tr>
                    <th scope="row"><?= $type->lib ?> </th>
                    <td> <?= number_format($type->PrixMoyen,2) . "€<br>" ?></td>
                </tr>

                <?php
                }
                ?>
                </table>
                <div class="container">
                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col">
                            <a href="addPanier.php?id_ticket=<?= $price->id; ?>"><button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Ajouter au panier</button></a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
<?php endforeach; }?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $('.add').click(function () {
        if ($(this).prev().val() < 100) {
            $(this).prev().val(+$(this).prev().val() + 1);
        }
    });
    $('.sub').click(function () {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        }
    });



</script>
<?php
if(!$events){

}else{
    require 'footer.php';
}

?>
