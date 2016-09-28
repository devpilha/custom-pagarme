<?php

namespace PagarMe\SdkTest\Transaction\Request;

use PagarMe\Sdk\Transaction\Request\CreditCardTransactionCreate;
use PagarMe\Sdk\Transaction\CreditCardTransaction;

class CreditCardTransactionCreateTest extends \PHPUnit_Framework_TestCase
{
    const PATH   = 'transactions';
    const METHOD = 'POST';

    const CARD_ID = 1;

    public function installmentsProvider()
    {
        return [
            [1,null,null],
            [3,true, 'example.com'],
            [12,false, 'example.com'],
            [rand(1, 12), null, null]
        ];
    }

    /**
     * @dataProvider installmentsProvider
     * @test
    **/
    public function mustPayloadBeCorrect($installments, $capture, $postbackUrl)
    {
        $transaction =  $this->getTransaction($installments, $capture, $postbackUrl);
        $transactionCreate = new CreditCardTransactionCreate($transaction);

        $this->assertEquals(
            [
                'amount'         => 1337,
                'card_id'        => self::CARD_ID,
                'installments'   => $installments,
                'payment_method' => 'credit_card',
                'capture'        => $capture,
                'postback_url'   => $postbackUrl,
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
        $transaction =  $this->getTransaction(rand(1, 12), false, null);
        $transactionCreate = new CreditCardTransactionCreate($transaction);

        $this->assertEquals(self::PATH, $transactionCreate->getPath());
    }

    /**
     * @test
    **/
    public function mustMethodBeCorrect()
    {
        $transaction =  $this->getTransaction(rand(1, 12), false, null);
        $transactionCreate = new CreditCardTransactionCreate($transaction);

        $this->assertEquals(self::METHOD, $transactionCreate->getMethod());
    }

    private function getTransaction($installments, $capture, $postbackUrl)
    {
        $customerMock = $this->getCustomerMock();
        $cardMock     = $this->getCardMock();

        $transaction =  new CreditCardTransaction(
            [
                'amount'       => 1337,
                'card'         => $cardMock,
                'customer'     => $customerMock,
                'installments' => $installments,
                'capture'      => $capture,
                'postbackUrl'  => $postbackUrl
            ]
        );

        return $transaction;
    }

    public function getCardMock()
    {
        $cardMock = $this->getMockBuilder('PagarMe\Sdk\Card\Card')
            ->disableOriginalConstructor()
            ->getMock();

        $cardMock->method('getId')
            ->willReturn(self::CARD_ID);

        return $cardMock;
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
