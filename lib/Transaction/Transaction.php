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

    public function getCardId()
    {
        return $this->card->getId();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getRefuseReason()
    {
        return $this->refuseReason;
    }

    public function getStatusReason()
    {
        return $this->statusReason;
    }

    public function getAcquirerName()
    {
        return $this->acquirerName;
    }

    public function getAcquirerResponseCode()
    {
        return $this->acquirerResponseCode;
    }

    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    public function getSoftDescriptor()
    {
        return $this->softDescriptor;
    }

    public function getTid()
    {
        return $this->tid;
    }

    public function getNsu()
    {
        return $this->nsu;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getInstallments()
    {
        return $this->installments;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getPostbackUrl()
    {
        return $this->postbackUrl;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    public function getAntifraudScore()
    {
        return $this->antifraudScore;
    }

    public function getReferer()
    {
        return $this->referer;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function getSubscriptionId()
    {
        return $this->subscriptionId;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function getCard()
    {
        return $this->card;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }
}
