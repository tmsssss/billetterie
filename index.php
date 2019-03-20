<?php require 'header.php'; ?>
<!-- SECTION -->
<div class="section">
    <div class="container">

        <!-- container -->
        <?php $events = $db->query('SELECT * FROM events'); ?>
        <?php foreach($events as $event): ?>

            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="./img/<?= $event->id ?>.png" alt=""">
                    </div>
                    <div class="shop-body">
                    </div>
                    <a href="event.php?id=<?= $event->id; ?>" class="cta-btn"> <h3 style="margin-top: 12px;"><?= $event->name?></h3>
                        Shop now <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<!-- /SECTION -->

<?php require 'footer.php'; ?>
