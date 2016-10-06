<?php

namespace PagarMe\Sdk\Customer;

use PagarMe\Sdk\AbstractHandler;
use PagarMe\Sdk\Client;
use PagarMe\Sdk\Customer\Request\CustomerCreate;
use PagarMe\Sdk\Customer\Request\CustomerGet;
use PagarMe\Sdk\Customer\Request\CustomerList;

class CustomerHandler extends AbstractHandler
{
    /**
     * @param string $name
     * @param string $email
     * @param int $documentNumber
     * @param Address $address
     * @param Phone $phone
     * @param string $bornAt
     * @param string $gender
     */
    public function create(
        $name,
        $email,
        $documentNumber,
        Address $address,
        Phone $phone,
        $bornAt = null,
        $gender = null
    ) {
        $request = new CustomerCreate(
            $name,
            $email,
            $documentNumber,
            $address,
            $phone,
            $bornAt,
            $gender
        );

        $response = $this->client->send($request);

        return new Customer($this->getCustomerInfo($response));
    }

    /**
     * @param int $customerID
     */
    public function get($customerId)
    {
        $request = new CustomerGet($customerId);
        $response = $this->client->send($request);

        return new Customer($this->getCustomerInfo($response));
    }

    /**
     * @param int $page
     * @param int $count
     */
    public function getList($page = 1, $count = 10)
    {
        $request = new CustomerList($page, $count);
        $response = $this->client->send($request);

        $customers = [];
        foreach ($response as $customerResponse) {
            $customers[] = new Customer($this->getCustomerInfo($customerResponse));
        }

        return $customers;
    }

    /**
     * @param array $addressData
     * @return Address
     */
    private function buildAddress($addressData)
    {
        $address = new Address(
            $addressData->street,
            $addressData->street_number,
            $addressData->neighborhood,
            $addressData->zipcode
        );

        $address->setComplementary($addressData->complementary);
        $address->setCity($addressData->city);
        $address->setState($addressData->state);
        $address->setCountry($addressData->country);

        return $address;
    }

    /**
     * @param array $phoneData
     * @return Phone
     */
    private function buildPhone($phoneData)
    {
        $phone = new Phone(
            $phoneData->ddd,
            $phoneData->number,
            $phoneData->ddi
        );

        return $phone;
    }

    /**
     * @param array $addressData
     * @return array
     */
    private function getCustomerInfo($response)
    {
        $customerInfo = get_object_vars($response);

        $customerInfo['address'] = $this->buildAddress(
            $customerInfo['addresses'][0]
        );

        $customerInfo['phone'] = $this->buildPhone(
            $customerInfo['phones'][0]
        );

        return $customerInfo;
    }
}
