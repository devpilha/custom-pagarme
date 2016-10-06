<?php

namespace PagarMe\Sdk\Card;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\Client;
use PagarMe\Sdk\Card\Card;
use PagarMe\Sdk\Card\Request\CardCreate;
use PagarMe\Sdk\Card\Request\CardGet;

class CardHandler extends AbstractHandler
{
    /**
     * @param int $cardNumber
     * @param string $holderName
     * @param string $cardExpirationDate
     * @return Card
     */
    public function create($cardNumber, $holderName, $cardExpirationDate)
    {
        $request = new CardCreate(
            $cardNumber,
            $holderName,
            $cardExpirationDate
        );

        return new Card($this->client->send($request));
    }

    /**
     * @param int $cardId
     * @return Card
     */
    public function get($cardId)
    {
        $request = new CardGet(
            $cardId
        );

        return new Card($this->client->send($request));
    }
}
