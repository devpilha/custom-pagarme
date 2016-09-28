<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\Request;

class TransactionCapture implements Request
{
    protected $transactionId;

    /**
     * @codeCoverageIgnore
     */
    public function __construct($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public function getPayload()
    {
        return [];
    }

    public function getPath()
    {
        return sprintf('transactions/%d/capture', $this->transactionId);
    }

    public function getMethod()
    {
        return 'POST';
    }
}
