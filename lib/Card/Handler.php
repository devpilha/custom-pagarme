<?php

namespace PagarMe\Sdk\Card;

use PagarMe\Sdk\Client;
use PagarMe\Sdk\Card\Card;
use PagarMe\Sdk\Card\Request\CardCreate;
use PagarMe\Sdk\Card\Request\CardGet;

class Handler
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function create($cardNumber, $holderName, $cardExpirationDate)
    {
        $request = new CardCreate(
            $cardNumber,
            $holderName,
            $cardExpirationDate
        );

        return new Card($this->client->send($request));
    }

    public function get($cardId)
    {
        $request = new CardGet(
            $cardId
        );

        return new Card($this->client->send($request));
    }
}
