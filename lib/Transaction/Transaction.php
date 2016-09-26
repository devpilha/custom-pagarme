<?php

namespace PagarMe\Sdk\Transaction;

class Transaction
{
    use \PagarMe\Sdk\Fillable;

    private $id;
    private $status;
    private $refuseReason;
    private $statusReason;
    private $acquirerName;
    private $acquirerResponseCode;
    private $authorizationCode;
    private $softDescriptor;
    private $tid;
    private $nsu;
    private $dateCreated;
    private $dateUpdated;
    private $amount;
    private $installments;
    private $cost;
    private $postbackUrl;
    private $paymentMethod;
    private $antifraudScore;
    private $referer;
    private $ip;
    private $subscriptionId;
    private $phone;
    private $address;
    private $customer;
    private $card;
    private $metadata;

    public function __construct($arrayData)
    {
        $this->fill($arrayData);
    }

    /**
    * @codeCoverageIgnore
    */
    public function getCardId()
    {
        return $this->card->getId();
    }

    /**
    * @codeCoverageIgnore
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getStatus()
    {
        return $this->status;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getRefuseReason()
    {
        return $this->refuseReason;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getStatusReason()
    {
        return $this->statusReason;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getAcquirerName()
    {
        return $this->acquirerName;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getAcquirerResponseCode()
    {
        return $this->acquirerResponseCode;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getSoftDescriptor()
    {
        return $this->softDescriptor;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getTid()
    {
        return $this->tid;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getNsu()
    {
        return $this->nsu;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getCost()
    {
        return $this->cost;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getPostbackUrl()
    {
        return $this->postbackUrl;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getAntifraudScore()
    {
        return $this->antifraudScore;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getIp()
    {
        return $this->ip;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getAddress()
    {
        return $this->address;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getCard()
    {
        return $this->card;
    }

    /**
    * @codeCoverageIgnore
    */
    public function getMetadata()
    {
        return $this->metadata;
    }
}
