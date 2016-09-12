<?php

namespace PagarMe\Sdk;

class PagarMeException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct(json_encode($message), 0);
    }
}
