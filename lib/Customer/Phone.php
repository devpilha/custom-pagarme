<?php

namespace PagarMe\Sdk\Customer;

class Phone
{
    /**
     * @var int $ddd | DDD (Discagem Direta à Distância)
     */
    private $ddd;

    /**
     * @var int $number | Número do telefone
     */
    private $number;

    /**
     * @var int $ddi | DDI (Discagem Direta Internacional)
     */
    private $ddi;

    /*
     * @param int $ddd
     * @param int $number
     * @param int $ddi
     */
    public function __construct($ddd, $number, $ddi = null)
    {
        $this->ddd    = $ddd;
        $this->number = $number;
        $this->ddi    = $ddi;
    }

    /**
     * @return int
     */
    public function getDdd()
    {
        return $this->ddd;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return int
     */
    public function getDdi()
    {
        return $this->ddi;
    }
}
