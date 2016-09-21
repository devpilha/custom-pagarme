<?php

namespace PagarMe\Sdk\Transaction;

use PagarMe\Sdk\Client;
use PagarMe\Sdk\Transaction\Request\TransactionCreate;
use PagarMe\Sdk\Card\Card;
use PagarMe\Sdk\Customer\Customer;

class Handler
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function create(
        $amount,
        Card $card,
        Customer $customer,
        $installments = 1
    ) {
        $transaction = new Transaction(
            [
                'amount'       => $amount,
                'card'         => $card,
                'customer'     => $customer,
                'installments' => $installments
            ]
        );

        $request = new TransactionCreate($transaction);

        $result = $this->client->send($request);

        return new Transaction($result);
    }
}
