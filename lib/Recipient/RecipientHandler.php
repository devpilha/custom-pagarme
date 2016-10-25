<?php

namespace PagarMe\Sdk\Recipient;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\Account\Account;
use PagarMe\Sdk\Recipient\Request\RecipientCreate;
use PagarMe\Sdk\Recipient\Request\RecipientList;
use PagarMe\Sdk\Recipient\Request\RecipientGet;
use PagarMe\Sdk\Recipient\Request\RecipientUpdate;
use PagarMe\Sdk\Recipient\Request\RecipientBalance;
use PagarMe\Sdk\Recipient\Request\RecipientBalanceOperation;
use PagarMe\Sdk\Recipient\Request\RecipientBalanceOperations;
use PagarMe\Sdk\Balance\Balance;
use PagarMe\Sdk\Balance\Operation;
use PagarMe\Sdk\Balance\Movement;

class RecipientHandler extends AbstractHandler
{
    public function create(
        Account $bankAccount,
        $transferInterval = null,
        $transferDay = null,
        $transferEnabled = null,
        $automaticAnticipationEnabled = null,
        $anticipatableVolumePercentage = null
    ) {
        $request = new RecipientCreate(
            $bankAccount,
            $transferInterval,
            $transferDay,
            $transferEnabled,
            $automaticAnticipationEnabled,
            $anticipatableVolumePercentage
        );

        $result = $this->client->send($request);

        $result->bank_account = new Account(
            get_object_vars($result->bank_account)
        );

        return new Recipient($result);
    }

    public function getList($page = null, $count = null)
    {
        $request = new RecipientList($page, $count);

        $result = $this->client->send($request);

        $recipients = [];
        foreach ($result as $recipient) {
            $recipient->bank_account = new Account(
                get_object_vars($recipient->bank_account)
            );

            $recipients[] = new Recipient(
                get_object_vars($recipient)
            );
        }

        return $recipients;
    }

    public function get($recipientId)
    {
        $request = new RecipientGet($recipientId);

        $result = $this->client->send($request);

        $result->bank_account = new Account(
            $result->bank_account
        );

        return new Recipient(
            $result
        );
    }

    public function update(Recipient $recipient)
    {
        $request = new RecipientUpdate($recipient);

        $result = $this->client->send($request);

        $result->bank_account = new Account(
            $result->bank_account
        );

        return new Recipient(
            $result
        );
    }

    public function balance(Recipient $recipient)
    {
        $request = new RecipientBalance($recipient);

        $result = $this->client->send($request);

        return new Balance($result);
    }

    public function balanceOperation(Recipient $recipient, Operation $operation)
    {
        $request = new RecipientBalanceOperation($recipient, $operation);

        $result = $this->client->send($request);

        $result->movement = new Movement($result->movement_object);

        return new Operation(get_object_vars($result));
    }
}
