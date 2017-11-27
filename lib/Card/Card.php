<?php

namespace PagarMe\Sdk\Card;

class Card
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int
     */
    public $id;

    /**
     * @var \DateTime
     */
    public $dateCreated;

    /**
     * @var \DateTime
     */
    public $dateUpdated;

    /**
     * @var string
     */
    public $brand;

    /**
     * @var string
     */
    public $holderName;

    /**
     * @var string
     */
    public $firstDigits;

    /**
     * @var string
     */
    public $lastDigits;

    /**
     * @var string
     */
    public $fingerprint;

    /**
     * @var object
     */
    public $customer;

    /**
     * @var boolean
     */
    public $valid;

    /**
     * @var string
     */
    public $expirationDate;

    /**
     * @var string
     */
    public $hash;

    /**
     * @param array $arrayData
     */
    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @return string
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
    public function getFirstDigits()
    {
        return $this->firstDigits;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getLastDigits()
    {
        return $this->lastDigits;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnoree
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return \DateTime
     * @codeCoverageIgnoree
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getHolderName()
    {
        return $this->holderName;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @return object
     * @codeCoverageIgnore
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return boolean
     * @codeCoverageIgnore
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getHash()
    {
        return $this->hash;
    }
}
