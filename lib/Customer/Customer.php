<?php

namespace PagarMe\Sdk\Customer;

class Customer
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int | Identificador do cliente
     */
    private $id;

    /**
     * @var PagarMe\Sdk\Customer\Address | Endereço do cliente
     */
    private $address;

    /**
     * @var string | Data de nascimento
     */
    private $bornAt;

    /**
     * @var string | Data de criação do registro
     */
    private $dateCreated;

    /**
     * @var int | Numero do documento do cliente
     */
    private $documentNumber;

    /**
     * @var string | Tipo de documento do cliente
     */
    private $documentType;

    /**
     * @var string | E-mail do cliente
     */
    private $email;

    /**
     * @var string | Gênero
     */
    private $gender;

    /**
     * @var string | Nome do cliente
     */
    private $name;

    /**
     * @var PagarMe\Sdk\Customer\PagarMe\Sdk\Customer\Phone | Telefone do cliente
     */
    private $phone;

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
