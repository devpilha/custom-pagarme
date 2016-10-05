<?php

namespace PagarMe\Sdk\Customer;

class Address
{
    private $street;
    private $streetNumber;
    private $neighborhood;
    private $zipcode;

    public function __construct($street, $streetNumber, $neighborhood, $zipcode)
    {
        $this->street       = $street;
        $this->streetNumber = $streetNumber;
        $this->neighborhood = $neighborhood;
        $this->zipcode      = $zipcode;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }
}
