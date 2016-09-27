<?php

namespace PagarMe\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use PagarMe\Sdk\Customer\Customer;

class CustomerContext extends BasicContext
{
    use Helper\CustomerDataProvider;

    private $customer;
    private $customerData;
    private $customerList;

    /**
     * @Given customer data
     */
    public function customerData()
    {
        $this->customerData = $this->getValidCustomerData();
    }

    /**
     * @When register this data
     */
    public function registerThisData()
    {
        $this->customer = self::getPagarMe()
            ->customer()
            ->create(new Customer($this->customerData));
    }

    /**
     * @Then an customer must be created
     */
    public function anCustomerMustBeCreated()
    {
        assertInstanceOf('PagarMe\Sdk\Customer\Customer', $this->customer);
    }

    /**
     * @Then the customer must be retrievable
     */
    public function theCustomerMustBeRetrievable()
    {
        $customer = self::getPagarMe()
            ->customer()
            ->get($this->customer->getId());

        assertEquals($customer, $this->customer);
    }

    /**
     * @Given I had multiple customers registered
     */
    public function iHadMultipleCustomersRegistered()
    {
        $this->customerData();
        $this->registerThisData();
        $this->customerData['document_number'] = '55453790962';
        $this->registerThisData();
    }

    /**
     * @When query customers
     */
    public function queryCustomers()
    {
         $this->customerList = self::getPagarMe()
            ->customer()
            ->getList();
    }

    /**
     * @Then an array of customers must be returned
     */
    public function anArrayOfCustomersMustBeReturned()
    {
        assertContainsOnly('PagarMe\Sdk\Customer\Customer', $this->customerList);
        assertGreaterThanOrEqual(2, count($this->customerList));
    }
}
