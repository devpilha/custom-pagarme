<?php

namespace PagarMe\Sdk\Transaction;

use PagarMe\Sdk\Client;

class Handler
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function create($amount, $cardId, $metadata)
    {
        $request = new TransactionCreate(
            $amount,
            $cardId,
            $metadata
        );

        return new Transaction($this->client->send($request));
    }
}
