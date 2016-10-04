<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\Transaction\CreditCardTransaction;

class CreditCardTransactionCreate extends TransactionCreate
{
    public function __construct(CreditCardTransaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getPayload()
    {
        $basicData = parent::getPayload();

        $cardData = [
            'card_id'      => $this->transaction->getCardId(),
            'installments' => $this->transaction->getInstallments(),
            'capture'      => $this->transaction->isCapturable()
        ];

        return array_merge($basicData, $cardData);
    }
}
