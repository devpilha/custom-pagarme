<?php

namespace PagarMe\Sdk\Customer;

class Address
{
    private $street;
    private $streetNumber;
    private $neighborhood;
    private $zipcode;
    private $complementary;
    private $city;
    private $state;
    private $country;

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

    public function setComplementary($complementary)
    {
        $this->complementary = $complementary;
    }

    public function getComplementary()
    {
        return $this->complementary;
    }
    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }
    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }
    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getCountry()
    {
        return $this->country;
    }
}
