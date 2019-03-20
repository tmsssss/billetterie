<?php
if(isset($_GET['ticket']) && isset($_GET['token'])){
    require'headerBis.php';

    $tickets = $db->query('SELECT * FROM tickets WHERE id=:id', array(
        'id' => $_GET['ticket']
    ));

    foreach ($tickets as $ticket) {

        if($_GET['token'] == $ticket->confirmation_token) {
            $up = $db->query('UPDATE tickets SET confirmed_token = confirmation_token, confirmation_token = NULL, confirmed_at = NOW() WHERE id=:id ', array(
                'id' => $_GET['ticket']
            ));
            ?>         <div class="container">
                <div class="row text-center">
                    <div class="col-sm-6 col-sm-offset-3">
                        <br><br> <h2 style="color:#0fad00">Scan Validé</h2>


                        <br><br>
                    </div>

                </div>
            </div>
            <?php
        }elseif($_GET['token'] == $ticket->confirmed_token || $_GET['ticket'] == $ticket->id && $ticket->confirmed_at != NULL && is_int($_GET['ticket'])){ ?>
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-6 col-sm-offset-3"><p></p>
                        <br><br> <h2 style="color:red">Billet déja scanné le : <?= $ticket->confirmed_at ?></h2>


                        <br><br>
                    </div>

                </div>
            </div>

        <?php }else{
            ?>
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-6 col-sm-offset-3">
                        <br><br> <h2 style="color:red">Billet invalide</h2>


                        <br><br>
                    </div>

                </div>
            </div>
            <?php
        }
    }
}else{
    echo 'Erreur 404';
}







