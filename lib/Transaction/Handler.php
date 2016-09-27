<?php

namespace PagarMe\Sdk\Transaction;

use PagarMe\Sdk\Client;
use PagarMe\Sdk\Transaction\Request\CreditCardTransactionCreate;
use PagarMe\Sdk\Transaction\Request\BoletoTransactionCreate;
use PagarMe\Sdk\Transaction\Request\TransactionGet;
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
        $installments = 1
    ) {
        $transaction = new CreditCardTransaction(
            [
                'amount'       => $amount,
                'card'         => $card,
                'customer'     => $customer,
                'installments' => $installments
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

        if ($result->payment_method == BoletoTransaction::PAYMENT_METHOD) {
            return new BoletoTransaction($result);
        }

        if ($result->payment_method == CreditCardTransaction::PAYMENT_METHOD) {
            return new CreditCardTransaction($result);
        }

        throw new UnsupportedTransaction(
            sprintf(
                'Transaction type: %s, is not supported',
                $result->payment_method
            ),
            1
        );
    }
}
