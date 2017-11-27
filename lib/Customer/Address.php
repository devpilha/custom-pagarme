<?php

namespace PagarMe\Sdk\Customer;

class Address
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var string
     */
    public $street;

    /**
     * @var string
     */
    public $streetNumber;

    /**
     * @var string
     */
    public $neighborhood;

    /**
     * @var string
     */
    public $zipcode;

    /**
     * @var string
     */
    public $complementary;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $country;

    /**
     * @param array $addressData
     */
    public function __construct($addressData)
    {
        $this->fill($addressData);
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getComplementary()
    {
        return $this->complementary;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getCountry()
    {
        return $this->country;
    }
}
