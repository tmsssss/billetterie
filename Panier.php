<?php
class Panier{
    private $db;
    // CONSTRUCTEUR
    public function __construct($db){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
        $this->db = $db;
        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']);
        }
        if(isset($_POST['panier']['quantity'])){
            $this->recalc();
        }
    }

    // FONCTION AJOUTANT AU PANIER
    public function recalc(){
        if($_SESSION['panier'] < $_POST['panier']['quantity'] || $_SESSION['panier'] > $_POST['panier']['quantity']){
            $_SESSION['panier'] = $_POST['panier']['quantity'];
        }else{
            $_SESSION['panier'] = $_SESSION['panier'] + $_POST['panier']['quantity'];
        }
    }

    // FONCTION DELETE
    public function del($product_id){
        unset($_SESSION['panier'][$product_id]);
    }

    // FONCTION COMPTANT LE NOMBRE D'ELEMENTS DANS LE PANIER
    public function count(){
       return array_sum($_SESSION['panier']);
    }


}
