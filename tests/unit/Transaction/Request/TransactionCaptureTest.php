<?php

namespace PagarMe\SdkTest\Transaction\Request;

use PagarMe\Sdk\Transaction\Request\TransactionCapture;
use PagarMe\Sdk\Transaction\CreditCardTransaction;
use PagarMe\Sdk\RequestInterface;

class TransactionCaptureTest extends \PHPUnit_Framework_TestCase
{
    const PATH   = 'transactions/%s/capture';

    public function transactionCaptureProvider()
    {
        return [
            [555, null , []],
            [273690, 500 , ['amount'   => 500]],
            [888888, 76500 , ['amount' => 76500]]
        ];
    }

    /**
     * @dataProvider transactionCaptureProvider
     * @test
     */
    public function mustPayloadBeCorrectWithTransactionId(
        $transactionId,
        $amount,
        $payload
    ) {
        $transaction = $this->getAbstractClassMock();

        $transaction->method('getId')->willReturn($transactionId);

        $transactionCreate = new TransactionCapture($transaction, $amount);

        $this->assertEquals(
            $payload,
            $transactionCreate->getPayload()
        );

        $this->assertEquals(
            sprintf(self::PATH, $transactionId),
            $transactionCreate->getPath()
        );

        $this->assertEquals(RequestInterface::HTTP_POST, $transactionCreate->getMethod());
    }

    /**
     * @dataProvider transactionCaptureProvider
     * @test
     */
    public function mustPayloadBeCorrectWithToken($token, $amount, $payload)
    {
        $transaction = $this->getAbstractClassMock();

        $transaction->method('getToken')->willReturn($token);

        $transactionCreate = new TransactionCapture($transaction, $amount);

        $this->assertEquals(
            $payload,
            $transactionCreate->getPayload()
        );

        $this->assertEquals(
            sprintf(self::PATH, $token),
            $transactionCreate->getPath()
        );

        $this->assertEquals(RequestInterface::HTTP_POST, $transactionCreate->getMethod());
    }

    /**
     * @test
     */
    public function mustUseTransactionIdInsteadOfToken()
    {
        $transactionId = 123456;
        $transaction = $this->getAbstractClassMock();

        $transaction->method('getToken')->willReturn('abcdef');
        $transaction->method('getId')->willReturn($transactionId);

        $transactionCreate = new TransactionCapture($transaction, null);

        $this->assertEquals(
            sprintf(self::PATH, $transactionId),
            $transactionCreate->getPath()
        );
    }

    protected function getAbstractClassMock()
    {
        return $this->getMockBuilder(
            'PagarMe\Sdk\Transaction\AbstractTransaction'
        )->disableOriginalConstructor()
        ->getMock();
    }
}
