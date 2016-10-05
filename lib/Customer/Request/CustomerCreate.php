<?php

namespace PagarMe\Sdk\Customer\Request;

use PagarMe\Sdk\Request;
use PagarMe\Sdk\Customer\Address;
use PagarMe\Sdk\Customer\Phone;

class CustomerCreate implements Request
{
    private $name;
    private $email;
    private $documentNumber;
    private $address;
    private $phone;
    private $bornAt;
    private $gender;

    public function __construct(
        $name,
        $email,
        $documentNumber,
        Address $address,
        Phone $phone,
        $bornAt,
        $gender
    ) {
        $this->name           = $name;
        $this->email          = $email;
        $this->documentNumber = $documentNumber;
        $this->address        = $address;
        $this->phone          = $phone;
        $this->bornAt         = $bornAt;
        $this->gender         = $gender;
    }

    public function getPayload()
    {
        return [
            'name'            => $this->name,
            'email'           => $this->email,
            'document_number' => $this->documentNumber,
            'address'         => $this->getAddresssData(),
            'phone'           => $this->getPhoneData(),
            'born_at'         => $this->bornAt,
            'gender'          => $this->gender
        ];
    }

    public function getPath()
    {
        return 'customers';
    }

    public function getMethod()
    {
        return 'POST';
    }

    private function getAddresssData()
    {
        $addressData = [
            'street'        => $this->address->getStreet(),
            'street_number' => $this->address->getStreetNumber(),
            'neighborhood'  => $this->address->getNeighborhood(),
            'zipcode'       => $this->address->getZipcode()
        ];

        if (!is_null($this->address->getComplementary())) {
            $addressData['complementary'] = $this->address->getComplementary();
        }

        if (!is_null($this->address->getCity())) {
            $addressData['city'] = $this->address->getCity();
        }

        if (!is_null($this->address->getState())) {
            $addressData['state'] = $this->address->getState();
        }

        if (!is_null($this->address->getCountry())) {
            $addressData['country'] = $this->address->getCountry();
        }

        return $addressData;
    }

    private function getPhoneData()
    {
        $phoneData = [
            'ddd'    => $this->phone->getDdd(),
            'number' => $this->phone->getNumber()
        ];

        if (!is_null($this->phone->getDdi())) {
            $phoneData['ddi'] = $this->phone->getDdi();
        }

        return $phoneData;
    }
}
