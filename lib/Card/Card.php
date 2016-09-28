<?php

namespace PagarMe\Sdk\Card;

class Card
{
    use \PagarMe\Sdk\Fillable;

    private $id;
    private $dateCreated;
    private $dateUpdated;
    private $brand;
    private $holderName;
    private $firstDigits;
    private $lastDigits;
    private $fingerprint;
    private $customer;
    private $valid;

    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getFirstDigits()
    {
        return $this->firstDigits;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getLastDigits()
    {
        return $this->lastDigits;
    }
}
