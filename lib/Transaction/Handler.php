<?php

namespace PagarMe\Sdk\Transaction;

use PagarMe\Sdk\Client;
use PagarMe\Sdk\Transaction\Request\CreditCardTransactionCreate;
use PagarMe\Sdk\Transaction\Request\BoletoTransactionCreate;
use PagarMe\Sdk\Card\Card;
use PagarMe\Sdk\Customer\Customer;

class Handler
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function creditCardTransaction(
        $amount,
        Card $card,
        Customer $customer,
        $installments = 1
    ) {
        $transaction = new CreditCardTransaction(
            [
                'amount'       => $amount,
                'card'         => $card,
                'customer'     => $customer,
                'installments' => $installments
            ]
        );

        $request = new CreditCardTransactionCreate($transaction);

        $result = $this->client->send($request);

        return new CreditCardTransaction($result);
    }

    public function boletoTransaction(
        $amount,
        Customer $customer,
        $postBackUrl
    ) {
        $transaction = new BoletoTransaction(
            [
                'amount'      => $amount,
                'customer'    => $customer,
                'postBackUrl' => $postBackUrl
            ]
        );

        $request = new BoletoTransactionCreate($transaction);

        $result = $this->client->send($request);

        return new BoletoTransaction($result);
    }
}
