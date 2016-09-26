<?php

namespace PagarMe\Sdk\Transaction;

class BoletoTransaction extends Transaction
{
    const PAYMENT_METHOD = 'boleto';

    protected $boletoExpirationDate;

    public function __construct($arrayData)
    {
        parent::__construct($arrayData);
        $this->paymentMethod = self::PAYMENT_METHOD;
    }

    public function getBoletoExpirationDate()
    {
        return $boletoExpirationDate;
    }
}
