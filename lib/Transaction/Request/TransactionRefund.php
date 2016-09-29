<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\Request;
use PagarMe\Sdk\Transaction\Transaction;

class TransactionRefund implements Request
{
    protected $transaction;

    /**
     * @codeCoverageIgnore
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getPayload()
    {
        return [];
    }

    public function getPath()
    {
        return sprintf('transactions/%d/refund', $this->transaction->getId());
    }

    public function getMethod()
    {
        return 'POST';
    }
}
