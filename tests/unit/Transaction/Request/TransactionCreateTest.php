<?php

namespace PagarMe\SdkTest\Transaction\Request;

use PagarMe\Sdk\Transaction\Request\TransactionCreate;
use PagarMe\Sdk\Transaction\Transaction;

class TransactionCreateTest extends \PHPUnit_Framework_TestCase
{
    const PATH   = 'transactions';
    const METHOD = 'POST';

    /**
     * @test
    **/
    public function mustPayloadBeCorrect()
    {
        $transaction =  $this->getTransaction();
        $transactionCreate = new TransactionCreate($transaction);

        $this->assertEquals(
            [
                'amount'  => 1337,
                'card_id' => 'card_ci6l9fx8f0042rt16rtb477gj'
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
        $transactionCreate = new TransactionCreate($transaction);

        $this->assertEquals(self::PATH, $transactionCreate->getPath());
    }

    /**
     * @test
    **/
    public function mustMethodBeCorrect()
    {
        $transaction =  $this->getTransaction();
        $transactionCreate = new TransactionCreate($transaction);

        $this->assertEquals(self::METHOD, $transactionCreate->getMethod());
    }

    private function getTransaction()
    {
        $cardMock = $this->getMockBuilder('PagarMe\Sdk\Card\Card')
            ->disableOriginalConstructor()
            ->getMock();

        $cardMock->method('getId')
            ->willReturn('card_ci6l9fx8f0042rt16rtb477gj');

        return new Transaction(
            [
                'amount' => 1337,
                'card'   => $cardMock
            ]
        );
    }
}
