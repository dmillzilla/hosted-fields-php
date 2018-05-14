<?php
session_start();
require_once("../templates/braintree_init.php");
?>

<html>
<?php require_once("../templates/base.html.twig"); ?>
<body>

    <?php require_once("../templates/nav.php"); ?>
    <div class="container">
      <script language="Javascript"></script>

      <h1 align="center">(ʃƪ¬‿¬) Join Supervillain University today (¬‿¬ʃƪ)</h4>
      <h2 align="center"><small>The best bootcamp to teach you how to take over the world in 6 easy steps.</small></h4><hr>

      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <h4><strong>Sign Up</strong></h4>
          </div>
          <div class="panel-body">
            <form action="/checkout.php" method="post" id="payment-form">
              <div class="form-group col-md-12">
                <label for="cardholder_name">Cardholder Name</label>
                <input class="form-control" name="cardholder_name" placeholder="Cardholder Name">
              </div>
              <div class="form-group col-md-12">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Email">
              </div>

              <div class="form-group col-md-12">
                <label for="card-number">Card Number</label>
                <div id="card-number" class="form-control"></div>
              </div>
              <div class="form-group col-md-6">
                <label for="expiration-date">Expiration Date</label>
                <div id="expiration-date" class="form-control"></div>
              </div>
              <div class="form-group col-md-6">
                <label for="cvv">CVV</label>
                <div id="cvv" class="form-control"></div>
              </div>
              <div class="form-group col-md-12">
                <label for="postal_code">Postal Code</label>
                <div id="postal-code" class="form-control"></div>
              </div>
              <div class="form-group col-md-12">
                <label for="amount">Choose Your Donation Amount</label>
                <input class="form-control" name="amount" type="number" min="1" max="5000" placeholder="Amount must be greater than 0">
              </div>
              <input name="payment_method_nonce" type="hidden">
              <div class="form-group col-md-12">
                <input class="btn btn-default form-control" type="submit" value="Enroll Now" disabled />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
      var form = document.querySelector('#payment-form');
      var submit = document.querySelector('input[type="submit"]');
      var tokenizeCardholderName = document.querySelector('input[name="cardholder_name"]');
      var client_token = "<?php echo($gateway->ClientToken()->generate()); ?>";

      braintree.client.create({
        authorization: client_token
      }, function (clientErr, clientInstance) {
        if (clientErr) {
          console.error(clientErr);
          return;
        }

        braintree.hostedFields.create({
          client: clientInstance,
          styles: {
            'input': {
              'font-size': '14px'
            },
            'input.invalid': {
              'color': 'red'
            },
            'input.valid': {
              'color': 'green'
            }
          },
          fields: {
            number: {
              selector: '#card-number',
              placeholder: '4111 1111 1111 1111'
            },
            cvv: {
              selector: '#cvv',
              placeholder: '123'
            },
            expirationDate: {
              selector: '#expiration-date',
              placeholder: '02/20'
            },
            postalCode: {
              selector: '#postal-code',
              placeholder: '12345'
            }
          }
        }, function (hostedFieldsErr, hostedFieldsInstance) {
          if (hostedFieldsErr) {
            console.error(hostedFieldsErr);
            return;
          }

          submit.removeAttribute('disabled');

          form.addEventListener('submit', function (event) {
            event.preventDefault();

            hostedFieldsInstance.tokenize({
              cardholderName: tokenizeCardholderName.value,
            }, function (tokenizeErr, payload) {
              if (tokenizeErr) {
                console.error(tokenizeErr);
                return;
              }
              // If needed, use this to test nonce creation
              // console.log('Got a nonce: ' + payload.nonce);
              document.querySelector('input[name="payment_method_nonce"]').value = payload.nonce;
              form.submit();
            });
          }, false);
        });
      });
    </script>
</body>
</html>
