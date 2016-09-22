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
        $customer = $this->transaction->getCustomer();

        $address  = $customer->getAddress();
        $phone    = $customer->getPhone();

        return [
            'amount'  => $this->transaction->getAmount(),
            'card_id' => $this->transaction->getCardId(),
            'customer' => [
                'name'            => $customer->getName(),
                'document_number' => $customer->getDocumentNumber(),
                'email'           => $customer->getEmail(),
                'sex'             => $customer->getGender(),
                'born_at'         => $customer->getBornAt(),
                'address' => [
                    'street'        => $address['street'],
                    'street_number' => $address['street_number'],
                    'complementary' => isset($address['complementary']) ? $address['complementary']: null,
                    'neighborhood'  => $address['neighborhood'],
                    'zipcode'       => $address['zipcode']
                ],
                'phone' => [
                    'ddd'    => $phone['ddd'],
                    'number' => $phone['number']
                ]
            ]
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
