<?php
require '_header.php';

// Affichage des billets mis dans le panier
$ids = array_keys($_SESSION['panier']);
if (empty($ids)) {
    $prices = array();
}
else {
    $prices = $db->query('SELECT * FROM prices WHERE id IN (' . implode(',', $ids) . ')');
}


$total = 0;

// Gestion de l'affichage du prix total
foreach ($prices as $price) {
    $total += $price->price * $_SESSION['panier'][$price->id];
    $events = $db->query('SELECT name FROM events WHERE id =:id', array('id' => $price->id_event));
}
// Gestion code promo
if(isset($_POST['promo']) && $_POST['promo'] == 'SV14') {
    $total = $total - number_format($total * 0.20, 2);
}



?>