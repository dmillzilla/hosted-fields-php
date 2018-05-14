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

3. In the root directory, create a new file called `.env`. Copy the contents of `example.env` into your new `.env` file. Insert your Braintree API credentials into `.env`. You can find your API credentials by following [these steps](https://articles.braintreepayments.com/control-panel/important-gateway-credentials#api-credentials).

4. Start the PHP app:
```
php bin/console server:run
```

5. When creating transaction, feel free to use the credit cards referenced in [this Braintree developer doc](https://developers.braintreepayments.com/reference/general/testing/php#no-credit-card-errors). You can use any future expiration date and any valid CVV.

### Built With

* [Symfony](https://symfony.com/) - The web framework used
* [Bootstrap](https://getbootstrap.com/) - HTML and CSS framework for styling
* [Composer](https://gist.github.com/shashankmehta/6ff13acd60f449eea6311cba4aae900a) - Dependency manager
* [Braintree](https://braintreepayments.com) - Payment functionality
