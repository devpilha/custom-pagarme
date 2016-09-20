<?php

namespace PagarMe\Sdk;

use GuzzleHttp\Exception\TransferException;

class ClientException extends PagarMeException
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}
