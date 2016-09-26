<?php

namespace Pagarme\SdkTests\Transaction;

use PagarMe\Sdk\Transaction\Handler;
use PagarMe\Sdk\Transaction\Transaction;

class HandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
    **/
    public function mustCreateTransaction()
    {
        $clientMock = $this->getMockBuilder('PagarMe\Sdk\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $clientMock->method('send')
            ->willReturn(json_decode($this->transactionCreateResponse()));

        $handler = new Handler($clientMock);

        $card = $this->getMockBuilder('PagarMe\Sdk\Card\Card')
            ->disableOriginalConstructor()
            ->getMock();

        $customer = $this->getMockBuilder('PagarMe\Sdk\Customer\Customer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertInstanceOf(
            'PagarMe\Sdk\Transaction\Transaction',
            $handler->create(
                $amount,
                $card,
                $customer
            )
        );
    }

    public function transactionCreateResponse()
    {
        return '{"object":"transaction","status":"processing","refuse_reason":null,"status_reason":"acquirer","acquirer_response_code":null,"authorization_code":null,"soft_descriptor":"testeDeAPI","tid":null,"nsu":null,"date_created":"2015-02-25T21:54:56.000Z","date_updated":"2015-02-25T21:54:56.000Z","amount":310000,"installments":5,"id":184220,"cost":0,"postback_url":"http://requestb.in/pkt7pgpk","payment_method":"credit_card","antifraud_score":null,"boleto_url":null,"boleto_barcode":null,"boleto_expiration_date":null,"referer":"api_key","ip":"189.8.94.42","subscription_id":null,"phone":null,"address":null,"customer":null,"card":{"object":"card","id":"card_ci6l9fx8f0042rt16rtb477gj","date_created":"2015-02-25T21:54:56.000Z","date_updated":"2015-02-25T21:54:56.000Z","brand":"mastercard","holder_name":"Api Customer","first_digits":"548045","last_digits":"3123","fingerprint":"HSiLJan2nqwn","valid":null},"metadata":{"idProduto":"13933139"}}';
    }
}
