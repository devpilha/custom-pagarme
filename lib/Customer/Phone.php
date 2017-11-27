<?php

namespace PagarMe\Sdk\Customer;

class Phone
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int $ddd
     */
    public $ddd;

    /**
     * @var int $number
     */
    public $number;

    /**
     * @var int $ddi
     */
    public $ddi;

    /**
     * @param array $phoneData
     */
    public function __construct($phoneData)
    {
        $this->fill($phoneData);
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getDdi()
    {
        return $this->ddi;
    }
}
