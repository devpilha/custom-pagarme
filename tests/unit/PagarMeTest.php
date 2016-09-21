<?php


namespace PagarMe\SdkTest;

use PagarMe\Sdk\PagarMe;

class PagarMeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
    **/
    public function mustReturnCardHandler()
    {
        $pagarMe = new PagarMe('apiKey');
        $this->assertInstanceOf(
            'PagarMe\Sdk\Card\Handler',
            $pagarMe->card()
        );
    }

    /**
     * @test
    **/
    public function mustReturnCustomerHandler()
    {
        $pagarMe = new PagarMe('apiKey');
        $this->assertInstanceOf(
            'PagarMe\Sdk\Customer\Handler',
            $pagarMe->customer()
        );
    }

    /**
     * @test
    **/
    public function mustReturnSameCardHandler()
    {
        $pagarMe = new PagarMe('apiKey');

        $cardHandlerA = $pagarMe->card();
        $cardHandlerB = $pagarMe->card();

        $this->assertSame($cardHandlerA, $cardHandlerB);
    }

    /**
     * @test
    **/
    public function mustReturnTransactionHandler()
    {
        $pagarMe = new PagarMe('apiKey');
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
        $pagarMe = new PagarMe('apiKey');
        $transactionHandlerA = $pagarMe->transaction();
        $transactionHandlerB = $pagarMe->transaction();
        $this->assertSame($transactionHandlerA, $transactionHandlerB);
    }

    /**
     * @test
    **/
    public function mustReturnSameCustomerHandler()
    {
        $pagarMe = new PagarMe('apiKey');

        $customerHandlerA = $pagarMe->customer();
        $customerHandlerB = $pagarMe->customer();

        $this->assertSame($customerHandlerA, $customerHandlerB);
    }
}
