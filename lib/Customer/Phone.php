<?php

namespace PagarMe\Sdk\Customer;

class Phone
{
    private $ddd;
    private $number;
    private $ddi;

    public function __construct($ddd, $number, $ddi = null)
    {
        $this->ddd    = $ddd;
        $this->number = $number;
        $this->ddi    = $ddi;
    }

    public function getDdd()
    {
        return $this->ddd;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getDdi()
    {
        return $this->ddi;
    }
}
