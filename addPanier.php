<?php
require '_header.php';
if(isset($_GET['id_ticket'])){
    $product = $db->query('SELECT id, id_event FROM prices WHERE id=:id', array('id' => $_GET['id_ticket']));
    if(empty($product)){
        echo "Ce produit n'existe pas";
    }
    header('Location:cart.php');
}else{
    echo "Vous n'avez pas selectionné de produits a ajouté au panier";
}
