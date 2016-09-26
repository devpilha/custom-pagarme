<?php

namespace PagarMe\SdkTest\Transaction\Request;

use PagarMe\Sdk\Transaction\Request\BoletoTransactionCreate;
use PagarMe\Sdk\Transaction\BoletoTransaction;

class BoletoTransactionCreateTest extends \PHPUnit_Framework_TestCase
{
    const PATH   = 'transactions';
    const METHOD = 'POST';

    const CARD_ID = 1;

    /**
     * @test
    **/
    public function mustPayloadBeCorrect()
    {
        $transaction =  $this->getTransaction();
        $transactionCreate = new BoletoTransactionCreate($transaction);

        $this->assertEquals(
            [
                'amount'         => 1337,
                'payment_method' => 'boleto',
                'boleto_expiration_date' => null,
                'customer' => [
                    'name'            => 'Eduardo Nascimento',
                    'born_at'         => '15071991',
                    'document_number' => '10586649727',
                    'email'           => 'eduardo@eduardo.com',
                    'sex'             => 'M',
                    'address' => [
                        'street'        => 'rua teste',
                        'street_number' => 42,
                        'neighborhood'  => 'centro',
                        'zipcode'       => '01227200',
                        'complementary' => null
                    ],
                    'phone' => [
                        'ddd'    => 15,
                        'number' => 987523421
                    ]
                ]
            ],
            $transactionCreate->getPayload()
        );
    }

    /**
     * @test
    **/
    public function mustPathBeCorrect()
    {
        $transaction =  $this->getTransaction();
        $transactionCreate = new BoletoTransactionCreate($transaction);

        $this->assertEquals(self::PATH, $transactionCreate->getPath());
    }

    /**
     * @test
    **/
    public function mustMethodBeCorrect()
    {
        $transaction =  $this->getTransaction();
        $transactionCreate = new BoletoTransactionCreate($transaction);

        $this->assertEquals(self::METHOD, $transactionCreate->getMethod());
    }

    private function getTransaction()
    {
        $customerMock = $this->getCustomerMock();

        $transaction =  new BoletoTransaction(
            [
                'amount'        => 1337,
                'post_back_url' => 'example.com/postback',
                'customer'      => $customerMock,
            ]
        );

        return $transaction;
    }

    public function getCustomerMock()
    {
        $customerMock = $this->getMockBuilder('PagarMe\Sdk\Customer\Customer')
            ->disableOriginalConstructor()
            ->getMock();

        $customerMock->method('getBornAt')->willReturn('15071991');
        $customerMock->method('getDocumentNumber')->willReturn('10586649727');
        $customerMock->method('getEmail')->willReturn('eduardo@eduardo.com');
        $customerMock->method('getGender')->willReturn('M');
        $customerMock->method('getName')->willReturn('Eduardo Nascimento');
        $customerMock->method('getAddress')->willReturn(
            [
                'street'        => 'rua teste',
                'street_number' => 42,
                'neighborhood'  => 'centro',
                'zipcode'       => '01227200'
            ]
        );
        $customerMock->method('getPhone')->willReturn(
            [
                'ddd'    => 15,
                'number' => 987523421
            ]
        );

        return $customerMock;
    }
}
