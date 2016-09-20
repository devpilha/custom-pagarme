<?php

namespace PagarMe\SdkTest\Request;

use PagarMe\Sdk\Customer\Request\CustomerCreate;
use PagarMe\Sdk\Customer\Customer;

class CustomerCreateTest extends \PHPUnit_Framework_TestCase
{
    const PATH   = 'customers';
    const METHOD = 'POST';

    /**
     * @test
    **/
    public function mustPayloadBeCorrect()
    {
        $customer = $this->getCustomer();

        $customerCreate = new CustomerCreate($customer);

        $this->assertEquals(
            [
                'born_at' => '15071991',
                'document_number' => '10586649727',
                'email' => 'eduardo@eduardo.com',
                'gender' => 'M',
                'name' => 'Eduardo Nascimento',
                'address' => [
                    'street' => 'rua teste',
                    'street_number' => 42,
                    'neighborhood' => 'centro',
                    'zipcode' => '01227200'
                ],
                'phone' => [
                    'ddd' => 15,
                    'number' => 987523421
                ]
            ],
            $customerCreate->getPayload()
        );
    }

    /**
     * @test
    **/
    public function mustPathBeCorrect()
    {
        $customer = $this->getCustomer();

        $customerCreate = new CustomerCreate($customer);
        $this->assertEquals(self::PATH, $customerCreate->getPath());
    }

    /**
     * @test
    **/
    public function mustMethodBeCorrect()
    {
        $customer = $this->getCustomer();

        $customerCreate = new CustomerCreate($customer);
        $this->assertEquals(self::METHOD, $customerCreate->getMethod());
    }

    private function getCustomer()
    {
        $customerData = [
            'bornAt' => '15071991',
            'documentNumber' => '10586649727',
            'email' => 'eduardo@eduardo.com',
            'gender' => 'M',
            'name' => 'Eduardo Nascimento',
            'address' => [
                'street' => 'rua teste',
                'street_number' => 42,
                'neighborhood' => 'centro',
                'zipcode' => '01227200'
            ],
            'phone' => [
                'ddd' => 15,
                'number' => 987523421
            ]
        ];

        return new Customer($customerData);
    }
}
