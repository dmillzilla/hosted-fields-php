<?php
session_start();
require_once("../templates/braintree_init.php");

$email = $_POST["email"];
$amount = $_POST["amount"];
$nonce = $_POST["payment_method_nonce"];

$customerCreate = $gateway->customer()->create([
      'email' => $email,
      'paymentMethodNonce' => $nonce,
      'creditCard' => [
        'options' => [
          'verifyCard' => true
        ]
      ]
    ]);

    if ($customerCreate->success) {
      $token = $customerCreate->customer->paymentMethods[0]->token;
    } else {
      $_SESSION["error"] = $customerCreate->message;
      header("Location: index.php");
    }

if ($token) {
    $transactionSale = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodToken' => $token
    ]);

    if ($transactionSale->success) {
        $transaction = $transactionSale->transaction;
        header("Location: results.php?id=" . $transaction->id);
    } else {
        $_SESSION["error"] = $transactionSale->message;
        header("Location: index.php");
    }
}
