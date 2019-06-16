<?php
require '_header.php';
// Selection de l'evenement
$events = $db->query('SELECT * FROM events WHERE id=:id', array('id' => $_GET['id']));

// Fonction retournant le prix moyen par type de place
function getAveragePrice(){
    $db = new DB();
    $types = $db->query('SELECT lib, AVG(price) as PrixMoyen FROM typePlace, prices WHERE typePlace.lib = prices.typePlace GROUP BY typePlace,lib');

    return $types;
}

if(isset($_SESSION['panier']) && $_SESSION['panier'] != NULL){
    $ids = array_keys($_SESSION['panier']);
}
// Affichage des prix correspondants a l'evenement
$prices = $db->query('SELECT * FROM prices WHERE id_event=:id ORDER BY typePlace', array('id' => $_GET['id']));


// Gestion panier pour ne pas ajouter de billets quand le compteur est a 0
foreach ($prices as $price) {
    if(!isset($_SESSION['panier'][$price->id])){
        $_SESSION['panier'][$price->id] = NULL;
    }
    if(isset($_SESSION['panier']) && isset($_SESSION['panier'][$price->id]) && $_SESSION['panier'][$price->id] == '0' || $_SESSION['panier'][$price->id] == NULL ){
        unset($_SESSION['panier'][$price->id]);
    }
}

