<?php

namespace PagarMe\SdkTest\Transaction\Request;

use PagarMe\Sdk\Transaction\Request\TransactionRefund;
use PagarMe\Sdk\Transaction\CreditCardTransaction;

class TransactionRefundTest extends \PHPUnit_Framework_TestCase
{
    const METHOD         = 'POST';
    const PATH           = 'transactions/1337/refund';
    const TRANSACTION_ID = 1337;

    /**
     * @test
    **/
    public function mustPayloadBeCorrect()
    {
        $transactionCreate = new TransactionRefund($this->getTransactionMock());

        $this->assertEquals(
            [],
            $transactionCreate->getPayload()
        );
    }

    /**
     * @test
    **/
    public function mustPathBeCorrect()
    {
        $transactionCreate = new TransactionRefund($this->getTransactionMock());

        $this->assertEquals(
            sprintf(self::PATH, $transactionId),
            $transactionCreate->getPath()
        );
    }

    /**
     * @test
    **/
    public function mustMethodBeCorrect()
    {
        $transactionCreate = new TransactionRefund($this->getTransactionMock());

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
