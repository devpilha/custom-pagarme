<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\Request;
use PagarMe\Sdk\Transaction\Transaction;

class TransactionRefund implements Request
{
    protected $transaction;
    protected $amount;

    /**
     * @codeCoverageIgnore
     */
    public function __construct(Transaction $transaction, $amount)
    {
        $this->transaction = $transaction;
        $this->amount      = $amount;
    }

    public function getPayload()
    {
        return [
            'amount' => $this->amount
        ];
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
