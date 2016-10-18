<?php

namespace Pagarme\SdkTests\Recipient;

use PagarMe\Sdk\Recipient\RecipientHandler;
use PagarMe\Sdk\Recipient\Recipient;

class RecipientHandlerTest extends \PHPUnit_Framework_TestCase
{
    const TRANSFER_INTERVAL = 'weekly';
    const TRANSFER_DAY      = '5';
    const TRANSFER_ENABLED  = true;

    /**
     * @test
    **/
    public function mustReturnCreatedRecipient()
    {
        $bankAccountMock = $this->getMockBuilder('PagarMe\Sdk\Account\Account')
            ->disableOriginalConstructor()
            ->getMock();

        $clientMock =  $this->getMockBuilder('PagarMe\Sdk\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $clientMock->method('send')
            ->willReturn(json_decode('{"object":"recipient","id":"re_ci9bucss300h1zt6dvywufeqc","bank_account":{"object":"bank_account","id":4841,"bank_code":"341","agencia":"0932","agencia_dv":"5","conta":"58054","conta_dv":"1","document_type":"cpf","document_number":"26268738888","legal_name":"API BANK ACCOUNT","charge_transfer_fees":false,"date_created":"2015-03-19T15:40:51.000Z"},"transfer_enabled":true,"last_transfer":null,"transfer_interval":"weekly","transfer_day":5,"automatic_anticipation_enabled":true,"anticipatable_volume_percentage":85,"date_created":"2015-05-05T21:41:48.000Z","date_updated":"2015-05-05T21:41:48.000Z"}'));

        $handler = new RecipientHandler($clientMock);

        $recipient = $handler->create(
            $bankAccountMock,
            self::TRANSFER_INTERVAL,
            self::TRANSFER_DAY,
            self::TRANSFER_ENABLED
        );

        $this->assertInstanceOf(
            'PagarMe\Sdk\Recipient\Recipient',
            $recipient
        );
    }

    /**
     * @test
    **/
    public function mustReturnAnArrayOfRecipients()
    {
        $clientMock =  $this->getMockBuilder('PagarMe\Sdk\Client')
            ->disableOriginalConstructor()
            ->getMock();

        $clientMock->method('send')
            ->willReturn(json_decode($this->recipientsListResponse()));

        $handler = new RecipientHandler($clientMock);
        $recipients = $handler->getList();

        $this->assertContainsOnly(
            'PagarMe\Sdk\Recipient\Recipient',
            $recipients
        );
    }

    public function recipientsListResponse()
    {
        return '[{"object":"recipient","id":"re_ci7nhf1ay0007n016wd5t22nl","bank_account":{"object":"bank_account","id":4901,"bank_code":"341","agencia":"0932","agencia_dv":null,"conta":"58999","conta_dv":"3","document_type":"cpf","document_number":"26268738888","legal_name":"RECIPIENT TEST","charge_transfer_fees":true,"date_created":"2015-03-24T15:53:17.000Z"},"transfer_enabled":true,"last_transfer":null,"transfer_interval":"weekly","transfer_day":5,"date_created":"2015-03-24T15:53:27.000Z","date_updated":"2015-03-24T15:53:27.000Z"},{"object":"recipient","id":"re_ci7nheu0m0006n016o5sglg9t","bank_account":{"object":"bank_account","id":4901,"bank_code":"341","agencia":"0932","agencia_dv":null,"conta":"58999","conta_dv":"3","document_type":"cpf","document_number":"26268738888","legal_name":"RECIPIENT TEST","charge_transfer_fees":true,"date_created":"2015-03-24T15:53:17.000Z"},"transfer_enabled":true,"last_transfer":null,"transfer_interval":"weekly","transfer_day":5,"date_created":"2015-03-24T15:53:17.000Z","date_updated":"2015-03-24T15:53:17.000Z"},{"object":"recipient","id":"re_ci7ng63iv00bdp8164c05ggi9","bank_account":{"object":"bank_account","id":4841,"bank_code":"341","agencia":"0932","agencia_dv":"5","conta":"58054","conta_dv":"1","document_type":"cpf","document_number":"26268738888","legal_name":"API BANK ACCOUNT","charge_transfer_fees":false,"date_created":"2015-03-19T15:40:51.000Z"},"transfer_enabled":true,"last_transfer":null,"transfer_interval":"weekly","transfer_day":5,"date_created":"2015-03-24T15:18:30.000Z","date_updated":"2015-03-24T15:18:30.000Z"},{"object":"recipient","id":"re_ci76hxnym00b8dw16y3hdxb21","bank_account":{"object":"bank_account","id":1774,"bank_code":"000","agencia":"0000","agencia_dv":null,"conta":"00000","conta_dv":"0","document_type":"cnpj","document_number":"00000000000000","legal_name":"CONTA BANCARIA DE TESTES","charge_transfer_fees":true,"date_created":"2015-03-12T18:35:51.000Z"},"transfer_enabled":false,"last_transfer":null,"transfer_interval":null,"transfer_day":null,"date_created":"2015-03-12T18:35:51.000Z","date_updated":"2015-03-12T18:35:51.000Z"}]';
    }
}
