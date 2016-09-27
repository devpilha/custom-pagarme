<?php

namespace PagarMe\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use PagarMe\Sdk\Customer\Customer;

class TransactionContext extends BasicContext
{
    use Helper\CustomerDataProvider;

    const POSTBACK_URL = 'example.com/postback';

    private $creditCard;
    private $customer;

     /**
     * @When register a card with :number, :holder and :expiration
     */
    public function registerACardWithAnd($number, $holder, $expiration)
    {
        $this->creditCard = self::getPagarMe()
            ->card()
            ->create($number, $holder, $expiration);
    }

    /**
     * @Given a valid customer
     */
    public function aValidCustomer()
    {
        $customerData = $this->getValidCustomerData();
        $this->customer = new Customer($customerData);
    }


     /**
     * @Given make a credit card transaction with :amount and :installments
     */
    public function makeACreditCardTransactionWithAnd($amount, $installments)
    {
        $this->transaction = self::getPagarMe()
            ->transaction()
            ->creditCardTransaction(
                $amount,
                $this->creditCard,
                $this->customer,
                $installments
            );
    }

    /**
     * @Given make a boleto transaction with :amount
     */
    public function makeABoletoTransactionWith($amount)
    {
        $this->transaction = self::getPagarMe()
            ->transaction()
            ->boletoTransaction($amount, $this->customer, self::POSTBACK_URL);
    }


    /**
     * @Then a valid transaction must be created
     */
    public function aValidTransactionMustBeCreated()
    {
        assertInstanceOf(
            'PagarMe\Sdk\Transaction\Transaction',
            $this->transaction
        );
    }

    /**
     * @Given a valid card
     */
    public function aValidCard()
    {
        $this->registerACardWithAnd(4539706041746367, "John Doe", '0725');
    }

    /**
     * @Given a valid credit card transaction
     */
    public function aValidCreditCardTransaction()
    {
        $this->makeACreditCardTransactionWithAnd('1337', rand(1, 12));
    }

    /**
     * @Given a valid boleto transaction
     */
    public function aValidBoletoTransaction()
    {
        $this->makeABoletoTransactionWith(1337);
    }

    /**
     * @Then then transaction must be retriavable
     */
    public function thenTransactionMustBeRetriavable()
    {
        $transaction = self::getPagarMe()
            ->transaction()
            ->get($this->transaction->getId());

        assertEquals($this->transaction, $transaction);
    }
}
