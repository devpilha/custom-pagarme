<?php

namespace PagarMe\Sdk\Card;

class Card
{
    private $id;
    private $dateCreated;
    private $dateUpdated;
    private $brand;
    private $holderName;
    private $firstDigits;
    private $lastDigits;
    private $fingerprint;
    private $customer;
    private $valid;

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

    public function getId()
    {
        return $this->id;
    }

    private function attributeRelation()
    {
        return [
            'date_created' => 'dateCreated',
            'date_updated' => 'dateUpdated',
            'holder_name'  => 'holderName',
            'first_digits' => 'firstDigits',
            'last_digits'  => 'lastDigits'
        ];
    }
}
