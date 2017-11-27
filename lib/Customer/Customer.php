<?php

namespace PagarMe\Sdk\Customer;

class Customer
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int
     */
    public $id;

    /**
     * @var PagarMe\Sdk\Customer\Address
     */
    public $address;

    /**
     * @var string
     */
    public $bornAt;

    /**
     * @var \DateTime
     */
    public $dateCreated;

    /**
     * @var int
     */
    public $documentNumber;

    /**
     * @var string
     */
    public $documentType;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $gender;

    /**
     * @var string
     */
    public $name;

    /**
     * @var PagarMe\Sdk\Customer\Phone
     */
    public $phone;

    /**
     * @param array $arrayData
     */
    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @codeCoverageIgnore
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getBornAt()
    {
        return $this->bornAt;
    }

    /**
     * @codeCoverageIgnore
     * @return int
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @codeCoverageIgnore
     * @return object
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @codeCoverageIgnore
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }
}
