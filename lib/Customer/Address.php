<?php

namespace PagarMe\Sdk\Customer;

class Address
{

    /**
     * @var string | Nome da rua

     */
    private $street;

    /**
     * @var int | Número do imóvel
     */
    private $streetNumber;

    /**
     * @var string | Bairro
     */
    private $neighborhood;

    /**
     * @var string | Código postal (CEP) ex '01034020'
     */
    private $zipcode;

    /**
     * @var string | Complemento do endereço
     */
    private $complementary;

    /**
     * @var string | Cidade
     */
    private $city;

    /**
     * @var string | Estado
     */
    private $state;

    /**
     * @var string | Pais
     */
    private $country;

    /**
     * @param string $street
     * @param int $streetNumber
     * @param string $neighborhood
     * @param string $zipcode
     */
    public function __construct($street, $streetNumber, $neighborhood, $zipcode)
    {
        $this->street       = $street;
        $this->streetNumber = $streetNumber;
        $this->neighborhood = $neighborhood;
        $this->zipcode      = $zipcode;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return int
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @return string
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $complementary
     * @return Address
     */
    public function setComplementary($complementary)
    {
        $this->complementary = $complementary;
        return $this;
    }

    /**
     * @return string
     */
    public function getComplementary()
    {
        return $this->complementary;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $state
     * @return Address
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $country
     * @return Address
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }
}
