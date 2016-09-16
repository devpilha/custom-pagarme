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

    public function getId()
    {
        return $this->id;
    }

    public function getFirstDigits()
    {
        return $this->firstDigits;
    }

    public function getLastDigits()
    {
        return $this->lastDigits;
    }
}
