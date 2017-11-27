<?php

namespace PagarMe\Sdk\Transfer;

class Transfer
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $fee;

    /**
     * @var \DateTime
     */
    public $fundingEstimatedDate;

    /**
     * @var PagarMe\Sdk\BankAccount\BankAccount
     */
    public $bankAccount;

    /**
     * @var \DateTime
     */
    public $dateCreated;

    /**
     * @var string
     */
    public $sourceType;

    /**
     * @var string
     */
    public $sourceId;

    /**
     * @var string
     */
    public $targetType;

    /**
     * @var int
     */
    public $targetId;

    /**
     * @var \DateTime
     */
    public $fundingDate;


    /**
     * @param array $arrayData
     */
    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @return int $id
     * @codeCoverageIgnore
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int $amount
     * @codeCoverageIgnore
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string $type
     * @codeCoverageIgnore
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string $status
     * @codeCoverageIgnore
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int $fee
     * @codeCoverageIgnore
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getFundingEstimatedDate()
    {
        return $this->fundingEstimatedDate;
    }

    /**
     * @return PagarMe\Sdk\BankAccount\BankAccount $bankAccount
     * @codeCoverageIgnore
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
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
     * @return string
     * @codeCoverageIgnore
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getTargetID()
    {
        return $this->targetId;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnore
     */
    public function getFundingDate()
    {
        return $this->fundingDate;
    }
}
