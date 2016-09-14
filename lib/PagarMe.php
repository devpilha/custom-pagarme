<?php

namespace PagarMe\Sdk;

use GuzzleHttp\Client as GuzzleClient;
use PagarMe\Sdk\Customer\Handler as CustomerHandler;
use PagarMe\Sdk\Card\Handler as CardHandler;

class PagarMe
{
    private $client;
    private $customerHandler;

    public function __construct($apiKey, $encryptionKey)
    {
        $this->client = new Client(
            new GuzzleClient(['base_url' => 'https://api.pagar.me/1/']),
            $apiKey,
            $encryptionKey
        );
    }

    public function customer()
    {
        if (!$this->customerHandler instanceof CustomerHandler) {
            $this->customerHandler = new CustomerHandler($this->client);
        }

        return $this->customerHandler;
    }

    public function card()
    {
        if (!$this->cardHandler instanceof CardHandler) {
            $this->cardHandler = new CardHandler($this->client);
        }

        return $this->cardHandler;
    }
}
