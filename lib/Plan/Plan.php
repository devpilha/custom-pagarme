<?php

namespace PagarMe\Sdk\Plan;

class Plan
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @var int
     */
    public $amount;

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $days;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $trialDays;

    /**
     * @var array
     */
    public $paymentMethods;

    /**
     * @var int
     */
    public $charges;

    /**
     * @var int
     */
    public $installments;


    /**
     * @param array $planData
     */
    public function __construct($planData)
    {
        $this->fill($planData);
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @return string
     * @codeCoverageIgnore
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @codeCoverageIgnore
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getTrialDays()
    {
        return $this->trialDays;
    }

    /**
     * @param int $trialDays
     * @codeCoverageIgnore
     */
    public function setTrialDays($trialDays)
    {
        $this->trialDays = $trialDays;
        return $this;
    }

    /**
     * @return array
     * @codeCoverageIgnore
     */
    public function getPaymentMethods()
    {
        return $this->paymentMethods;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getCharges()
    {
        return $this->charges;
    }

    /**
     * @param int $charges
     * @codeCoverageIgnore
     */
    public function setCharges($charges)
    {
        $this->charges = $charges;
        return $this;
    }

    /**
     * @return int
     * @codeCoverageIgnore
     */
    public function getInstallments()
    {
        return $this->installments;
    }
}
