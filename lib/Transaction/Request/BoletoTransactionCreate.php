<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\Transaction\BoletoTransaction;

class BoletoTransactionCreate extends TransactionCreate
{
    public function __construct(BoletoTransaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getPayload()
    {
        $basicData = parent::getPayload();

        $boletoData = [
            'boleto_expiration_date' => $this->transaction->getBoletoExpirationDate()
        ];

        return array_merge($basicData, $boletoData);
    }
}
