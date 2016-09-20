<?php

namespace PagarMe\Sdk\Card\Request;

use PagarMe\Sdk\Request;

class CardCreate implements Request
{
    private $cardNumber;
    private $holderName;
    private $cardExpirationDate;

    public function __construct($cardNumber, $holderName, $cardExpirationDate)
    {
        $this->cardNumber         = $cardNumber;
        $this->holderName         = $holderName;
        $this->cardExpirationDate = $cardExpirationDate;
    }

    public function getPayload()
    {
        return [
            'card_number'          => $this->cardNumber,
            'holder_name'          => $this->holderName,
            'card_expiration_date' => $this->cardExpirationDate
        ];
    }

    public function getPath()
    {
        return 'cards';
    }

    public function getMethod()
    {
        return 'POST';
    }
}
