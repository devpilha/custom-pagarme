<?php

namespace PagarMe\Sdk\Transaction;

use PagarMe\Sdk\Client;
use PagarMe\Sdk\Transaction\Request\CreditCardTransactionCreate;
use PagarMe\Sdk\Transaction\Request\BoletoTransactionCreate;
use PagarMe\Sdk\Transaction\Request\TransactionGet;
use PagarMe\Sdk\Transaction\Request\TransactionList;
use PagarMe\Sdk\Transaction\Request\TransactionCapture;
use PagarMe\Sdk\Card\Card;
use PagarMe\Sdk\Customer\Customer;

class Handler
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function creditCardTransaction(
        $amount,
        Card $card,
        Customer $customer,
        $installments = 1,
        $capture = true,
        $postBackUrl = null,
        $metaData = null
    ) {
        $transaction = new CreditCardTransaction(
            [
                'amount'       => $amount,
                'card'         => $card,
                'customer'     => $customer,
                'installments' => $installments,
                'capture'      => $capture,
                'postbackUrl'  => $postBackUrl,
                'metaData'     => $metaData
            ]
        );
        $request = new CreditCardTransactionCreate($transaction);

        $result = $this->client->send($request);

        return new CreditCardTransaction($result);
    }

    public function boletoTransaction(
        $amount,
        Customer $customer,
        $postBackUrl
    ) {
        $transaction = new BoletoTransaction(
            [
                'amount'      => $amount,
                'customer'    => $customer,
                'postBackUrl' => $postBackUrl
            ]
        );

        $request = new BoletoTransactionCreate($transaction);

        $result = $this->client->send($request);

        return new BoletoTransaction($result);
    }

    public function get($transactionId)
    {
        $request = new TransactionGet($transactionId);

        $result = $this->client->send($request);

        return $this->buildTransaction($result);
    }

    public function getList($page = 1, $count = 10)
    {
        $request = new TransactionList($page, $count);
        $response = $this->client->send($request);

        $transactions = [];
        foreach ($response as $transactionData) {
            $transactions[] = $this->buildTransaction($transactionData);
        }

        return $transactions;
    }

    public function capture($transactionId, $amount = null)
    {
        $request = new TransactionCapture($transactionId, $amount);
        $response = $this->client->send($request);

        return $this->buildTransaction($response);
    }

    private function buildTransaction($transactionData)
    {
        if ($transactionData->payment_method == BoletoTransaction::PAYMENT_METHOD) {
            return new BoletoTransaction($transactionData);
        }

        if ($transactionData->payment_method == CreditCardTransaction::PAYMENT_METHOD) {
            return new CreditCardTransaction($transactionData);
        }

        throw new UnsupportedTransaction(
            sprintf(
                'Transaction type: %s, is not supported',
                $transactionData->payment_method
            ),
            1
        );
    }
}
