<?php

namespace PagarMe\Sdk\Transaction;

class CreditCardTransaction extends Transaction
{
    protected $card;
    protected $installments;

    public function getCardId()
    {
        return $this->card->getId();
    }

    public function getInstallments()
    {
        return $this->installments;
    }
}
