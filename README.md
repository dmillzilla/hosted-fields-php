# Braintree Hosted Fields

This is a Braintree Hosted Fields integration example in PHP.

### Setup

1. Download or clone this Github repo

2. If you have not installed Composer globally, user your terminal to navigate to the root directory and type:
```
php composer.phar install
```
   Otherwise, simply use:
```
composer install
```

3. In the root directory, Composer should have created a new file called `.env`. If not, create a new file called `.env`. Copy the contents of `example.env` into your new `.env` file. Insert your Braintree API credentials into `.env`. You can find your API credentials by following [these steps](https://articles.braintreepayments.com/control-panel/important-gateway-credentials#api-credentials).

4. Start the PHP app:
```
php bin/console server:run
```

5. The app should be available on `localhost:8000`

### Testing

When creating transaction, feel free to use the credit cards referenced in
[this Braintree developer doc](https://developers.braintreepayments.com/reference/general/testing/php#no-credit-card-errors).
You can use any future expiration date and any valid CVV. I've included a
Postal Code field for card verification through AVS. You can change your AVS
rules to check for gateway rejections. The card number, expiration, CVV, and
postal code fields are all Hosted Fields. Cardholder name is tokenized with
them in the nonce.

### Built With

* [Symfony](https://symfony.com/) - The web framework used
* [Bootstrap](https://getbootstrap.com/) - HTML and CSS framework for styling
* [Composer](https://gist.github.com/shashankmehta/6ff13acd60f449eea6311cba4aae900a) - Dependency manager
* [Braintree](https://braintreepayments.com) - Payment functionality
