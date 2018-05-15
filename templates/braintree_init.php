<?php
require_once("../vendor/autoload.php");

if(file_exists(__DIR__ . "../.env")) {
    $dotenv = new Dotenv\Dotenv(__DIR__ . "/../");
    $dotenv->load();
}

$gateway = new Braintree_Gateway([
    'environment' => getenv('BRAINTREE_ENVIRONMENT'),
    'merchantId' => getenv('BRAINTREE_MERCHANT_ID'),
    'publicKey' => getenv('BRAINTREE_PUBLIC_KEY'),
    'privateKey' => getenv('BRAINTREE_PRIVATE_KEY')
]);
