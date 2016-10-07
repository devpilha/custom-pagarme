# Pagarme-php

PHP integration for [Pagar.me  API](https://docs.pagar.me/api/)

## Installation
Via Composer
```sh
composer require 'pagarme/pagarme-php:dev-libV2'
```

## Usage
### Basic
First you need to create an PagarMe object with your API-KEY (Avaliable on your [dashboard](https://dashboard.pagar.me/#/myaccount/apikeys))
```php
$apiKey = 'ak_test_grXijQ4GicOa2BLGZrDRTR5qNQxJW0';
$pagarMe =  new \PagarMe\Sdk\PagarMe($apiKey);
```
### Card
Creating a card for future use
```php
$cardNumber = '4526290089026763';
$holderName = 'João Silva';
$cardExpirationDate = '0423';

$card = $pagarMe->card()->create(
    $cardNumber,
    $holderName,
    $cardExpirationDate
);
```
Returning a previous created card
```php
$cardId = 'card_ci6y37h16wrxsmzyi';
$card = $pagarMe->card()->get($cardId);
```
### Customer
Creating a customer
```php
// In order to create a customer, you will need a Phone and Address
$ddd = 11;
$number = 15110808;
$ddi = 55;
$phone = new PagarMe\Sdk\Customer\Phone(
    $ddd,
    $number,
    $ddi //optional param
);

$street = 'Av. Brg. Faria Lima';
$streetNumber = 100;
$neighborhood = 'Pinheiros';
$zipcode = '05426200';
$address = PagarMe\Sdk\Customer\Address(
    $street,
    $streetNumber,
    $neighborhood,
    $zipcode
);

//Optionally you can set other address data
$address->setComplementary('Ap 42');
$address->setCity('São Paulo');
$address->setState('SP');
$address->setCountry('Brasil');

$name = 'João Silva';
$email = 'joao.silva@company.com';
$documentNumber = '65838874600'; //CPF/CNPJ
$bornAt = '13121988';
$gender = 'M';
$customer = $pagarme->customer()->create(
    $name,
    $email,
    $documentNumber,
    $address,
    $phone,
    $bornAt, //Optional
    $gender //Optional
);
```
Listing customers
```php
$page = 2;
$count = 15;
$customers = $pagarme->customer()->getList(
    $page, //optional, default=1
    $count //optional, default=10
);
```
Getting specific customer
```php
$customerId = 11222;
$customer = $pagarme->customer()->get($customerId);
```
### Transaction
Creating transaction with creditcard
```php
$amount = 1337;
$installments = 12;
$capture = true; // use false to only authorize transaction
$postBackUrl = 'https://mycompany.com/postbackUrl';
$metaData = ['produtoId' => 123];
$extraAttributes = ['soft_descriptor' => 'Minha loja'];

$transaction = $pagarMe->transaction()->creditCardTransaction(
    $amount,
    $card, //Card object
    $customer, //Customer object
    $installments, //installments, default true
    $capture, //optional, default true
    $postBackUrl, // optional, default null, Endpoint on your system, to get updates about this transaction
    $metaData, //optional, default null,
    $extraAttributes //optional, default [] - other transaction attributes
);
```
Capturing a previous authorized transaction
```php
$amount = '999'; // Amount to be captured
$transaction = $pagarMe->transaction()->capture(
    $transaction, // CreditCardTransaction object
    $amount // optional, default null - pass null to capture full amount authorized
);
```
Creating transaction with boleto
```php
$amount = '1337'; // Amount to be captured
$transaction = $pagarMe->transaction()->boletoTransaction(
    $amount,
    $customer, // Customer Object
    $postBackUrl, // optional, default null, Endpoint on your system, to get updates about this transaction
    $extraAttributes // optional, default [] - other transaction attributes
);
```
Refundind a credit card transaction
```php
$amount = 999;
$transaction = $pagarMe->transaction()->creditCardRefund(
    $transaction, // CreditCardTransaction object
    $amount //optional, default null - use null to refund total transaction
);
```
Refundind a boleto transaction
```php
$amount = 999;
$transaction = $pagarMe->transaction()->boletoRefund(
    $transaction, // BoletoTransaction object
    $account, // Account object
    $amount // optional, default null - use null to refund total transaction
);
```
Getting a transaction
```php
$transactionId = 123456;
$transaction = $pagarMe->transaction()->get($transactionId);
```
Listing Transaction
```php
$page = 2;
$page = 15;
$transaction = $pagarMe->transaction()->get(
    $page, //optional, default=1
    $count //optional, default=10
);
```
