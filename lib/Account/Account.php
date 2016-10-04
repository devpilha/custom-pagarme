<?php

namespace PagarMe\Sdk\Account;

class Account
{
    use \PagarMe\Sdk\Fillable;

    private $bankAccountId;
    private $bankCode;
    private $agencia;
    private $agenciaDv;
    private $conta;
    private $contaDv;
    private $documentNumber;
    private $legalName;

    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    public function getBankAccountId()
    {
        return $this->bankAccountId;
    }

    public function getBankCode()
    {
        return $this->bankCode;
    }

    public function getAgencia()
    {
        return $this->agencia;
    }

    public function getAgenciaDv()
    {
        return $this->agenciaDv;
    }

    public function getConta()
    {
        return $this->conta;
    }

    public function getContaDv()
    {
        return $this->contaDv;
    }

    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    public function getLegalName()
    {
        return $this->legalName;
    }
}
