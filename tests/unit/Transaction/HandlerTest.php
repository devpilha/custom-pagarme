<?php

namespace Pagarme\SdkTests\Transaction;

use PagarMe\Sdk\Transaction\Handler;
use PagarMe\Sdk\Transaction\Transaction;

class HandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
    **/
    public function mustCreateCreditCardTransaction()
    {
        $clientMock = $this->getMockBuilder('PagarMe\Sdk\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $clientMock->method('send')
            ->willReturn($this->creditCardTransactionCreateResponse());

        $handler = new Handler($clientMock);

        $card = $this->getMockBuilder('PagarMe\Sdk\Card\Card')
            ->disableOriginalConstructor()
            ->getMock();

        $customer = $this->getMockBuilder('PagarMe\Sdk\Customer\Customer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertInstanceOf(
            'PagarMe\Sdk\Transaction\CreditCardTransaction',
            $handler->creditCardTransaction(
                310000,
                $card,
                $customer
            )
        );
    }

    /**
     * @test
    **/
    public function mustCreateBoletoTransaction()
    {
        $clientMock = $this->getMockBuilder('PagarMe\Sdk\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $clientMock->method('send')
            ->willReturn($this->boletoTransactionCreateResponse());

        $handler = new Handler($clientMock);

        $customer = $this->getMockBuilder('PagarMe\Sdk\Customer\Customer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertInstanceOf(
            'PagarMe\Sdk\Transaction\BoletoTransaction',
            $handler->boletoTransaction(
                310000,
                $customer,
                'example.com/postback'
            )
        );
    }

    /**
     * @test
    **/
    public function mustReturnBoletoTransaction()
    {
        $clientMock = $this->getMockBuilder('PagarMe\Sdk\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $clientMock->method('send')
            ->willReturn($this->boletoTransactionCreateResponse());

        $handler = new Handler($clientMock);

        $customer = $this->getMockBuilder('PagarMe\Sdk\Customer\Customer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertInstanceOf(
            'PagarMe\Sdk\Transaction\BoletoTransaction',
            $handler->get(12345)
        );
    }

    /**
     * @test
    **/
    public function mustReturnCreditCardTransaction()
    {
        $clientMock = $this->getMockBuilder('PagarMe\Sdk\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $clientMock->method('send')
            ->willReturn($this->creditCardTransactionCreateResponse());

        $handler = new Handler($clientMock);

        $customer = $this->getMockBuilder('PagarMe\Sdk\Customer\Customer')
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertInstanceOf(
            'PagarMe\Sdk\Transaction\CreditCardTransaction',
            $handler->get(12345)
        );
    }

    public function creditCardTransactionCreateResponse()
    {
        return json_decode('{"object":"transaction","status":"processing","refuse_reason":null,"status_reason":"acquirer","acquirer_response_code":null,"authorization_code":null,"soft_descriptor":"testeDeAPI","tid":null,"nsu":null,"date_created":"2015-02-25T21:54:56.000Z","date_updated":"2015-02-25T21:54:56.000Z","amount":310000,"installments":5,"id":184220,"cost":0,"postback_url":"http://requestb.in/pkt7pgpk","payment_method":"credit_card","antifraud_score":null,"boleto_url":null,"boleto_barcode":null,"boleto_expiration_date":null,"referer":"api_key","ip":"189.8.94.42","subscription_id":null,"phone":null,"address":null,"customer":null,"card":{"object":"card","id":"card_ci6l9fx8f0042rt16rtb477gj","date_created":"2015-02-25T21:54:56.000Z","date_updated":"2015-02-25T21:54:56.000Z","brand":"mastercard","holder_name":"Api Customer","first_digits":"548045","last_digits":"3123","fingerprint":"HSiLJan2nqwn","valid":null},"metadata":{"idProduto":"13933139"}}');
    }

    public function boletoTransactionCreateResponse()
    {
        return json_decode('{"object":"transaction","status":"waiting_payment","refuse_reason":null,"status_reason":"acquirer","acquirer_response_code":null,"acquirer_name":"pagarme","authorization_code":null,"soft_descriptor":null,"tid":733692,"nsu":733692,"date_created":"2016-09-26T19:14:35.119Z","date_updated":"2016-09-26T19:14:35.281Z","amount":3100,"authorized_amount":3100,"paid_amount":0,"refunded_amount":0,"installments":1,"id":733692,"cost":0,"card_holder_name":null,"card_last_digits":null,"card_first_digits":null,"card_brand":null,"postback_url":null,"payment_method":"boleto","capture_method":"ecommerce","antifraud_score":null,"boleto_url":"https://pagar.me","boleto_barcode":"1234 5678","boleto_expiration_date":"2016-10-03T03:00:00.117Z","referer":"api_key","ip":"187.11.121.49","subscription_id":null,"phone":null,"address":null,"customer":null,"card":null,"split_rules":null,"metadata":{},"antifraud_metadata":{}}');
    }
}
