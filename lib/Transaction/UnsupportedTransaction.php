<?php

namespace PagarMe\Sdk\Transaction;

use GuzzleHttp\Exception\TransferException;
use PagarMe\Sdk\PagarMeException;

class UnsupportedTransaction extends PagarMeException
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}
