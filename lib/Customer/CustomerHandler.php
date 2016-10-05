<?php

namespace PagarMe\Sdk\Customer;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\Client;
use PagarMe\Sdk\Customer\Request\CustomerCreate;
use PagarMe\Sdk\Customer\Request\CustomerGet;
use PagarMe\Sdk\Customer\Request\CustomerList;

class CustomerHandler extends AbstractHandler
{
    public function create(
        $name,
        $email,
        $documentNumber,
        Address $address,
        Phone $phone,
        $bornAt = null,
        $gender = null
    ) {
        $request = new CustomerCreate(
            $name,
            $email,
            $documentNumber,
            $address,
            $phone,
            $bornAt,
            $gender
        );

        $response = $this->client->send($request);

        return new Customer(get_object_vars($response));
    }

    public function get($customerId)
    {
        $request = new CustomerGet($customerId);
        $response = $this->client->send($request);

        return new Customer(get_object_vars($response));
    }

    public function getList($page = 1, $count = 10)
    {
        $request = new CustomerList($page, $count);
        $response = $this->client->send($request);

        $customers = [];
        foreach ($response as $customerData) {
            $customers[] = new Customer(get_object_vars($customerData));
        }

        return $customers;
    }
}
