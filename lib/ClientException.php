<?php

namespace PagarMe\Sdk;

use GuzzleHttp\Exception\TransferException;

class ClientException extends PagarMeException
{
    public function __construct(TransferException $exception)
    {
        parent::__construct(
            [
                'message'  => $exception->getMessage(),
            ],
            $exception->getCode()
        );
    }
}
