<?php

namespace PagarMe\Sdk\Customer;

class Customer
{
    use \PagarMe\Sdk\Fillable;

    private $address;
    private $bornAt;
    private $dateCreated;
    private $documentNumber;
    private $documentType;
    private $email;
    private $gender;
    private $id;
    private $name;
    private $phone;

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
    public function getBornAt()
    {
        return $this->bornAt;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getPhone()
    {
        return $this->phone;
    }

    private function attributeRelation()
    {
        return [
            'born_at'         => 'bornAt',
            'date_created'    => 'dateCreated',
            'document_number' => 'documentNumber',
            'document_type'   => 'documentType',
            'addresses'       => 'address',
            'phones'          => 'phone'
        ];
    }
}
