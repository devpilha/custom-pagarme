<?php

namespace PagarMe\Sdk\Customer\Request;

use PagarMe\Sdk\Request;
use PagarMe\Sdk\Customer\Customer;

class CustomerCreate implements Request
{
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getPayload()
    {
        return [
            'born_at'         => $this->customer->getBornAt(),
            'document_number' => $this->customer->getDocumentNumber(),
            'email'           => $this->customer->getEmail(),
            'gender'          => $this->customer->getGender(),
            'name'            => $this->customer->getName(),
            'address'         => $this->customer->getAddress(),
            'phone'           => $this->customer->getPhone()
        ];
    }

    public function getPath()
    {
        return 'customers';
    }

    public function getMethod()
    {
        return 'POST';
    }
}
