<?php

namespace PagarMe\Sdk\Transaction\Request;

use PagarMe\Sdk\RequestInterface;

class TransactionCapture implements RequestInterface
{
    /**
     * @var int
     */
    protected $transaction;
    /**
     * @var int
     */
    protected $amount;

    /**
     * @param PagarMe\Sdk\Transaction\Transaction $transaction
     * @param int $amount
     */
    public function __construct($transaction, $amount)
    {
        $this->transaction = $transaction;
        $this->amount = $amount;
    }

    /**
     * @return array
     */
    public function getPayload()
    {
        if (is_null($this->amount)) {
            return [];
        }
        return [
            'amount' => $this->amount
        ];
    }

    /**
     * @return mixed
     */
    protected function getTransactionId()
    {
        if ($this->transaction->getId()) {
            return $this->transaction->getId();
        }

        return $this->transaction->getToken();
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return sprintf('transactions/%d/capture', $this->gettransactionId());
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return self::HTTP_POST;
    }
}
