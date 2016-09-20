<?php

namespace PagarMe\Sdk\Card\Request;

use PagarMe\Sdk\Request;

class CardGet implements Request
{
    private $cardId;

    public function __construct($cardId)
    {
        $this->cardId = $cardId;
    }

    public function getPayload()
    {
        return [];
    }

    public function getPath()
    {
        return sprintf('cards/%s', $this->cardId);
    }

    public function getMethod()
    {
        return 'GET';
    }
}
