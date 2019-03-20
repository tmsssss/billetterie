<?php require_once 'vendor/autoload.php';
$stripe = [
    "secret_key"      => "sk_test_Lqn9DnLmhuh1zjLFwvyrZulC",
    "publishable_key" => "pk_test_b0YgCIKU7VpRDxcCytwijimQ",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);


