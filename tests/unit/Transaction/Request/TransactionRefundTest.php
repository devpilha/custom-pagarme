<?php

namespace PagarMe\SdkTest\Transaction\Request;

use PagarMe\Sdk\Transaction\Request\TransactionRefund;
use PagarMe\Sdk\Transaction\CreditCardTransaction;

class TransactionRefundTest extends \PHPUnit_Framework_TestCase
{
    const METHOD         = 'POST';
    const PATH           = 'transactions/1337/refund';
    const TRANSACTION_ID = 1337;

    public function refundAmountProvider()
    {
        return [
            [null],
            [1000],
            [300],
            [5050]
        ];
    }

    /**
     * @dataProvider refundAmountProvider
     * @test
    **/
    public function mustContentBeCorrect($amount)
    {
        $transactionCreate = new TransactionRefund(
            $this->getTransactionMock(),
            $amount
        );

        $this->assertEquals(
            [
                'amount' => $amount
            ],
            $transactionCreate->getPayload()
        );

        $this->assertEquals(
            sprintf(self::PATH, $transactionId),
            $transactionCreate->getPath()
        );

        $this->assertEquals(self::METHOD, $transactionCreate->getMethod());
    }

    private function getTransactionMock()
    {
        $transactionMock = $this->getMockBuilder('PagarMe\Sdk\Transaction\Transaction')
            ->disableOriginalConstructor()
            ->getMock();

        $transactionMock->method('getId')->willReturn(self::TRANSACTION_ID);

        return $transactionMock;
    }
}
