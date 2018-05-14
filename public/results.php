<html>
<?php require_once("../templates/base.html.twig"); ?>
<body>

  <?php
      require_once("../templates/braintree_init.php");
      require_once("../templates/nav.php");
      $transaction = $gateway->transaction()->find($_GET["id"]);
  ?>

  <div class="container">
    <div align="center">
      <h1><div class="col-md-4">✧*｡٩(ˊᗜˋ*)و✧*｡</div><div class="col-md-4"> You Did It </div><div class="col-md-4">✧*｡٩(ˊᗜˋ*)و✧*｡</div></h1><br />
      <h2><small>We'll totally definitely be reaching out shortly with the details of how take over the world. We promise!</small></h4>
    </div>
    <hr>
    <div class="col-md-12">
      <h1 class="col-md-6 col-md-offset-3"><small>Transaction</small></h1>
      <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th>Transaction ID</th>
              <td class="text-right"><?php echo($transaction->id) ?></td>
            </tr>
            <tr>
              <th>Amount</th>
              <td class="text-right">$<?php echo($transaction->amount) . " " . $transaction->currencyIsoCode ?></td>
            </tr>
            <tr>
              <th>Status</th>
              <td class="text-right"><?php echo ucfirst($transaction->status) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-12">
      <h1 class="col-md-6 col-md-offset-3"><small>Customer</small></h1>
      <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th>Cardholder Name</th>
              <td class="text-right"><?php echo($transaction->creditCardDetails->cardholderName) ?></td>
            </tr>
            <tr>
              <th>Email</th>
              <td class="text-right"><?php echo($transaction->customerDetails->email) ?></td>
            </tr>
            <tr>
              <th>Postal Code</th>
              <td class="text-right"><?php echo($transaction->billingDetails->postalCode) ?></td>
            </tr>
            <tr>
              <th>Date Added</th>
              <td class="text-right"><?php echo($transaction->createdAt->format('d/m/y')) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-12">
      <h1 class="col-md-6 col-md-offset-3"><small>Payment</small></h1>
      <div class="col-md-6 col-md-offset-3">
        <table class="table table-hover">
          <tbody>
            <tr>
              <th>Token</th>
              <td class="text-right"><?php echo($transaction->creditCardDetails->token) ?></td>
            </tr>
            <tr>
              <th>Number</th>
              <td class="text-right"><?php echo($transaction->creditCardDetails->maskedNumber) ?></td>
            </tr>
            <tr>
              <th>Expiration Date</th>
              <td class="text-right"><?php echo($transaction->creditCardDetails->expirationDate) ?></td>
            </tr>
            <tr>
              <th>Card Brand</th>
              <td class="text-right"><?php echo($transaction->creditCardDetails->cardType) ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
