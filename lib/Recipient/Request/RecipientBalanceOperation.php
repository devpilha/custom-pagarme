<?php

namespace PagarMe\Sdk\Recipient\Request;

use PagarMe\Sdk\Request;
use PagarMe\Sdk\Balance\Operation;
use PagarMe\Sdk\Recipient\Recipient;

class RecipientBalanceOperation implements Request
{

    private $recipient;
    private $operation;

    public function __construct(Recipient $recipient, Operation $operation)
    {
        $this->recipient  = $recipient;
        $this->operation  = $operation;
    }

    public function getPayload()
    {
        return [];
    }

    public function getPath()
    {
        return sprintf(
            'recipients/%s/balance/operations/%d',
            $this->recipient->getId(),
            $this->operation->getId()
        );
    }

    public function getMethod()
    {
        return 'GET';
    }
}
