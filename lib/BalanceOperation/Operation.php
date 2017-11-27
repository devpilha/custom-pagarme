<?php

namespace PagarMe\Sdk\BalanceOperation;

class Operation
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $balanceAmount;

    /**
     * @var int
     */
    public $balanceOldAmount;

    /**
     * @var string
     */
    public $movementType;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var int
     */
    public $fee;

    /**
     * @var \DateTime
     */
    public $dateCreated;

    /**
     * @var Movement
     */
    public $movement;

    public function __construct($recipientData)
    {
        $this->fill($recipientData);
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
     * @return string
     * @codeCoverageIgnore
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getBalanceAmount()
    {
        return $this->balanceAmount;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getBalanceOldAmount()
    {
        return $this->balanceOldAmount;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getMovementType()
    {
        return $this->movementType;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return int
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
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return Movement
     * @codeCoverageIgnore
     */
    public function getMovement()
    {
        return $this->movement;
    }
}
