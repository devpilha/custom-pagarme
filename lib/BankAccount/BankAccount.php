<?php

namespace PagarMe\Sdk\BankAccount;

class BankAccount
{
    use \PagarMe\Sdk\Fillable;

    const TYPE_CONTA_CORRENTE          = 'conta_corrente';
    const TYPE_CONTA_POUPANCA          = 'conta_poupanca';
    const TYPE_CONTA_CORRENTE_CONJUNTA = 'conta_corrente_conjunta';
    const TYPE_CONTA_POUPANCA_CONJUNTA = 'conta_poupanca_conjunta';

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $bankCode;

    /**
     * @var int
     */
    public $agencia;

    /**
     * @var int
     */
    public $agenciaDv;

    /**
     * @var int
     */
    public $conta;

    /**
     * @var int
     */
    public $contaDv;

    /**
     * @var int
     */
    public $documentNumber;

    /**
     * @var string
     */
    public $documentType;

    /**
     * @var string
     */
    public $legalName;

    /**
     * @var \DateTime
     */
    public $dateCreated;

    /**
     * @var string
     */
    public $type;

    /**
     * @param array $arrayData
     */
    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getAgenciaDv()
    {
        return $this->agenciaDv;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getContaDv()
    {
        return $this->contaDv;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @returnstring \DateTime
     * @codeCoverageIgnore
     */
    public function getType()
    {
        return $this->type;
    }
}
