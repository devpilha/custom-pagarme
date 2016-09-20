<?php

namespace PagarMe\Sdk\Customer\Request;

use PagarMe\Sdk\Request;

class CustomerGet implements Request
{
    private $customerId;

    public function __construct($customerId)
    {
        $this->customerId  = $customerId;
    }

    public function getPayload()
    {
        return [];
    }

    public function getPath()
    {
        return sprintf('customers/%d', $this->customerId);
    }

    public function getMethod()
    {
        return 'GET';
    }
}
