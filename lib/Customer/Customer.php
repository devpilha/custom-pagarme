<?php

namespace PagarMe\Sdk\Customer;

class Customer
{

    private $addresses;
    private $bornAt;
    private $dateCreated;
    private $documentNumber;
    private $documentType;
    private $email;
    private $gender;
    private $id;
    private $name;
    private $phones;

    public function __construct($arrayData)
    {
        $replaceableFields = array_keys($this->attributeRelation());
        foreach ($arrayData as $key => $value) {
            $field = $key;
            if (in_array($key, $replaceableFields)) {
                $field = $this->attributeRelation()[$key];
            }

            if (property_exists($this, $field)) {
                $this->$field = $value;
            }
        }
    }

    private function attributeRelation()
    {
        return [
            'born_at'         => 'bornAt',
            'date_created'    => 'dateCreated',
            'document_number' => 'documentNumber',
            'document_type'   => 'documentType',
        ];
    }
}
