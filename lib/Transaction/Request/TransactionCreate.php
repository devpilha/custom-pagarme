<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\Request;
use PagarMe\Sdk\Transaction\Transaction;

class TransactionCreate implements Request
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getPayload()
    {
        return [
            'amount'  => $this->transaction->getAmount(),
            'card_id' => $this->transaction->getCardId()
        ];
    }

    public function getPath()
    {
        return 'transactions';
    }

    public function getMethod()
    {
        return 'POST';
    }
}
