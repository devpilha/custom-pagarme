<?php

namespace PagarMe\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use PagarMe\Sdk\Account\Account;

class RecipientContext extends BasicContext
{
    private $interval;
    private $day;
    private $transfer;
    private $anticipation;
    private $percentage;

    private $bankAccount;
    private $agencia;
    private $agenciaDv;
    private $conta;
    private $contaDv;
    private $document;
    private $legalName;

    private $recipient;
    private $recipients;

    /**
     * @Given recipient data :interval, :day, :transfer, :anticipation and :percentage
     */
    public function recipientData($interval, $day, $transfer, $anticipation, $percentage)
    {
        $this->interval     = $this->parseNullParam($interval);
        $this->day          = $this->parseNullParam($day);
        $this->transfer     = $this->parseNullParam($transfer);
        $this->anticipation = $this->parseNullParam($anticipation);
        $this->percentage   = $this->parseNullParam($percentage);
    }

    /**
     * @Given bank data :bankCode, :agencia, :agenciaDv, :conta, :contaDv, :document and :legalName
     */
    public function bankData($bankCode, $agencia, $agenciaDv, $conta, $contaDv, $document, $legalName)
    {
        $this->bankCode  = $this->parseNullParam($bankCode);
        $this->agencia   = $this->parseNullParam($agencia);
        $this->agenciaDv = $this->parseNullParam($agenciaDv);
        $this->conta     = $this->parseNullParam($conta);
        $this->contaDv   = $this->parseNullParam($contaDv);
        $this->document  = $this->parseNullParam($document);
        $this->legalName = $this->parseNullParam($legalName);
    }

    /**
     * @When register the recipient
     */
    public function registerTheRecipient()
    {
        $account = $this->buildAccount(
            $this->bankCode,
            $this->agencia,
            $this->agenciaDv,
            $this->conta,
            $this->contaDv,
            $this->document,
            $this->legalName
        );

        $this->recipient = self::getPagarMe()
            ->recipient()
            ->create(
                $account,
                $this->interval,
                $this->day,
                $this->transfer,
                $this->anticipation,
                $this->percentage
            );
    }

    /**
     * @Then a recipient must be created
     */
    public function aRecipientMustBeCreated()
    {
        assertInstanceOf('PagarMe\Sdk\Recipient\Recipient', $this->recipient);
    }

    /**
     * @When register the account
     */
    public function registerTheAccount()
    {
        throw new PendingException('Criacao de contas nao implementado');
    }


    private function buildAccount(
        $bankCode,
        $agencia,
        $agenciaDv,
        $conta,
        $contaDv,
        $document,
        $legalName
    ){
        return new Account(
            [
                'bank_code'       => $this->bankCode,
                'agencia'         => $this->agencia,
                'agencia_dv'      => $this->agenciaDv,
                'conta'           => $this->conta,
                'conta_dv'        => $this->contaDv,
                'document_number' => $this->document,
                'legal_name'      => $this->legalName
            ]
        );
    }

    private function parseNullParam($param)
    {
        if ($param == 'null') {
            return null;
        }

        return $param;
    }

    /**
     * @Given previous created recipients
     */
    public function previousCreatedRecipients()
    {
        foreach ($this->getRecipientsData() as $recipientData) {
            $this->recipientData(
                $recipientData['interval'],
                $recipientData['day'],
                $recipientData['transfer'],
                $recipientData['anticipation'],
                $recipientData['percentage']
            );

            $this->bankData(
                $recipientData['bank_code'],
                $recipientData['agencia'],
                $recipientData['agencia_dv'],
                $recipientData['conta'],
                $recipientData['conta_dv'],
                $recipientData['document'],
                $recipientData['legal_name']
            );

            $this->registerTheRecipient();
        }
    }

    /**
     * @When query for recipients
     */
    public function queryForRecipients()
    {
        $this->recipients = self::getPagarMe()
            ->recipient()
            ->getList();
    }

    /**
     * @Then a list of recipients must be returned
     */
    public function aListOfRecipientsMustBeReturned()
    {
        assertContainsOnly(
            'PagarMe\Sdk\Recipient\Recipient',
            $this->recipients
        );
    }

    public function getRecipientsData()
    {
        return [
            [
                'interval' => 'null',
                'day' => 'null',
                'transfer' => 'null',
                'anticipation' => 'null',
                'percentage' => 'null',
                'bank_code' => '237',
                'agencia' => '1383',
                'agencia_dv' => '0',
                'conta' => '13399',
                'conta_dv' => '1',
                'document' => '44318031144',
                'legal_name' => 'João'
            ],
            [
                'interval' => 'daily',
                'day' => '0',
                'transfer' => 'true',
                'anticipation' => 'false',
                'percentage' => '50',
                'bank_code' => '341',
                'agencia' => '1384',
                'agencia_dv' => '1',
                'conta' => '13400',
                'conta_dv' => '2',
                'document' => '16360841843',
                'legal_name' => 'Maria'
            ],
            [
                'interval' => 'weekly',
                'day' => '3',
                'transfer' => 'false',
                'anticipation' => 'true',
                'percentage' => 'null',
                'bank_code' => '001',
                'agencia' => '1385',
                'agencia_dv' => '2',
                'conta' => '13401',
                'conta_dv' => '2',
                'document' => '19050151434',
                'legal_name' => 'José'
            ]
        ];
    }
}
