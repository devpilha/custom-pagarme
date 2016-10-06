<?php

namespace PagarMe\Sdk\Account;

class Account
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int | Identificador da conta bancária
     */
    private $bankAccountId;

    /**
     * @var int | Valor identificador do código do banco
     */
    private $bankCode;

    /**
     * @var int | Valor identificador da agência a qual a conta pertence
     */
    private $agencia;

    /**
     * @var int | Dígito verificador da agência
     */
    private $agenciaDv;

    /**
     * @var int | Número da conta bancária
     */
    private $conta;

    /**
     * @var int | Dígito verificador da conta
     */
    private $contaDv;

    /**
     * @var int | Tipo do documento do titular da conta
     */
    private $documentNumber;

    /**
     * @var string | Nome completo (se pessoa física) ou Razão Social (se pessoa jurídica)
     */
    private $legalName;


    /**
     * @param array $arrayData
     */
    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @return int
     */
    public function getBankAccountId()
    {
        return $this->bankAccountId;
    }

    /**
     * @return int
     */
    public function getBankCode()
    {
        return $this->bankCode;
    }

    /**
     * @return int
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @return int
     */
    public function getAgenciaDv()
    {
        return $this->agenciaDv;
    }

    /**
     * @return int
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @return int
     */
    public function getContaDv()
    {
        return $this->contaDv;
    }

    /**
     * @return int
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @return string
     */
    public function getLegalName()
    {
        return $this->legalName;
    }
}
