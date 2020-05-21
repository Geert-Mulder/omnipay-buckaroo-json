# Omnipay: Buckaroo (JSON)

An Omnipay module for the Buckaroo payment processor. This library uses the new JSON-based API, whereas [thephpleague/omnipay-buckaroo](https://github.com/thephpleague/omnipay-buckaroo) uses the old API.

## Installation

```
composer require league/omnipay Geert-Mulder/omnipay-buckaroo-json
```

## Usage

To let the user choose between iDeal, PayPal, MasterCard, and Visa on Buckaroo's payment page:

```php
$gateway = \Omnipay\Omnipay::create('\Geert-Mulder\Omnipay\Buckaroo\Gateway');
$gateway->setWebsiteKey('');
$gateway->setSecretKey('');
$gateway->setTestMode(true);

$response = $gateway->purchase([
    'amount' => '12.34',
    'currency' => 'EUR',
    'culture' => 'nl-nL',
    'transactionId' => '1',
    'paymentMethod' => 'ideal,paypal,mastercard,visa',
    'description' => 'Acme order #1',
    'returnUrl' => 'https://webshop.com/checkout/return',
    'pushUrl' => 'https://webshop.com/checkout/notify',
])->send();

if ($response->isRedirect()) {
    redirect($response->redirect());
} else {
    echo $response->getMessage();
}
```

If you want to use a specific payment method, e.g. iDeal:

```php
// ...

$response = $gateway->purchase([
    // ...
    'paymentMethod' => 'ideal',
])->send();
```

If, in addition, you want to redirect to the page of a specific issuer (e.g. ING Bank):

```php
// ...

$response = $gateway->purchase([
    // ...
    'paymentMethod' => 'ideal',
    'issuer' => 'INGBNL2A',
])->send();
```
