<?php

namespace PagarMe\Sdk\Recipient\Request;

use PagarMe\Sdk\Request;
use PagarMe\Sdk\Recipient\Recipient;

class RecipientUpdate implements Request
{

    private $recipient;

    public function __construct(Recipient $recipient)
    {
        $this->recipient  = $recipient;
    }

    public function getPayload()
    {
        $recipient   = $this->recipient;
        $bankAccount = $recipient->getBankAccount();

        return [
            'transfer_interval'               => $recipient->getTransferInterval(),
            'transfer_day'                    => $recipient->getTransferDay(),
            'transfer_enabled'                => $recipient->getTransferEnabled(),
            'automatic_anticipation_enabled'  => $recipient->getAutomaticAnticipationEnabled(),
            'anticipatable_volume_percentage' => $recipient->getAnticipatableVolumePercentage(),
            'bank_account_id'                 => $bankAccount->getId(),
            'bank_account' =>[
                'bank_code'       => $bankAccount->getBankCode(),
                'agencia'         => $bankAccount->getAgencia(),
                'conta'           => $bankAccount->getConta(),
                'conta_dv'        => $bankAccount->getContaDv(),
                'document_number' => $bankAccount->getDocumentNumber(),
                'legal_name'      => $bankAccount->getLegalName()
            ]
        ];
    }

    public function getPath()
    {
        return sprintf(
            'recipients/%s',
            $this->recipient->getId()
        );
    }

    public function getMethod()
    {
        return 'PUT';
    }
}
