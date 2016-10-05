<?php

namespace PagarMe\Sdk\Calculation\Request;

use PagarMe\Sdk\Request;

class CalculateInstallmentsRequest implements Request
{
    private $amount;
    private $interestRate;
    private $freeInstallments;
    private $maxInstallments;

    public function __construct(
        $amount,
        $interestRate,
        $freeInstallments,
        $maxInstallments
    ) {
        $this->amount           = $amount;
        $this->interestRate     = $interestRate;
        $this->freeInstallments = $freeInstallments;
        $this->maxInstallments  = $maxInstallments;
    }

    public function getPayload()
    {
        return [
            'amount'            => $this->amount,
            'interest_rate'     => $this->interestRate,
            'free_installments' => $this->freeInstallments,
            'max_installments'  => $this->maxInstallments
        ];
    }

    public function getPath()
    {
        return 'transactions/calculate_installments_amount';
    }

    public function getMethod()
    {
        return 'GET';
    }
}
