<?php

namespace PagarMe\Sdk\Recipient;

class Recipient
{
    use \PagarMe\Sdk\Fillable;

    /**
     * @param string $id
     **/
    protected $id;

    /**
     * @param PagarMe\Sdk\Account\Account $bankAccount
     **/
    protected $bankAccount;

    /**
     * @param bool $id
     **/
    protected $transferEnabled;

    /**
     * @param string $lastTransfer
     **/
    protected $lastTransfer;

    /**
     * @param string $transferInterval
     **/
    protected $transferInterval;

    /**
     * @param int $transferDay
     **/
    protected $transferDay;

    /**
     * @param bool $automaticAnticipationEnabled
     **/
    protected $automaticAnticipationEnabled;

    /**
     * @param int $anticipatableVolumePercentage
     **/
    protected $anticipatableVolumePercentage;

    /**
     * @param string $dateCreated
     **/
    protected $dateCreated;

    /**
     * @param string $dateUpdated
     **/
    protected $dateUpdated;

    public function __construct($recipientData)
    {
        $this->fill($recipientData);
    }

    /**
     * @return string
     **/
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return PagarMe
     **/
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @return bool
     **/
    public function getTransferEnabled()
    {
        return $this->transferEnabled;
    }

    /**
     * @return string
     **/
    public function getLastTransfer()
    {
        return $this->lastTransfer;
    }

    /**
     * @return string
     **/
    public function getTransferInterval()
    {
        return $this->transferInterval;
    }

    /**
     * @return int
     **/
    public function getTransferDay()
    {
        return $this->transferDay;
    }

    /**
     * @return bool
     **/
    public function getAutomaticAnticipationEnabled()
    {
        return $this->automaticAnticipationEnabled;
    }

    /**
     * @return int
     **/
    public function getAnticipatableVolumePercentage()
    {
        return $this->anticipatableVolumePercentage;
    }

    /**
     * @return string
     **/
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return string
     **/
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }
}