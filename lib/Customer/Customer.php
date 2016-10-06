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
     * @var array $arrayData
     */
    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
     * @codeCoverageIgnore
     * @param int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @codeCoverageIgnore
     * @param string $bornAt
     */
    public function getBornAt()
    {
        return $this->bornAt;
    }

    /**
     * @codeCoverageIgnore
     * @param int $documentNumber
     */
    public function getDocumentNumber()
    {
        return $this->documentNumber;
    }

    /**
     * @codeCoverageIgnore
     * @param string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @codeCoverageIgnore
     * @param string $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @codeCoverageIgnore
     * @param string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @codeCoverageIgnore
     * @param string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @codeCoverageIgnore
     * @param object $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
