<?php

namespace PagarMe\Sdk;

abstract class AbstractHandler
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
