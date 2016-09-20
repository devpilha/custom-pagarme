<?php

namespace PagarMe\SdkTest;

use PagarMe\Sdk\PagarMe;

class PagarmeTest extends \PHPUnit_Framework_TestCase
{
   /**
     * @test
    **/
    public function mustReturnTransactionHandler()
    {
        $pagarMe = new PagarMe('apiKey', 'encryptionKey');
        $this->assertInstanceOf(
            'PagarMe\Sdk\Transaction\Handler',
            $pagarMe->transaction()
        );
    }
    /**
     * @test
    **/
    public function mustReturnSameTransactionHandler()
    {
        $pagarMe = new PagarMe('apiKey', 'encryptionKey');
        $transactionHandlerA = $pagarMe->transaction();
        $transactionHandlerB = $pagarMe->transaction();
        $this->assertSame($transactionHandlerA, $transactionHandlerB);
    }
}
