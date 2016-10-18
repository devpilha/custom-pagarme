<?php

namespace PagarMe\Sdk\Recipient;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\Account\Account;
use PagarMe\Sdk\Recipient\Request\RecipientCreate;
use PagarMe\Sdk\Recipient\Request\RecipientList;

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
}
