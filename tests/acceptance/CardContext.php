<?php

namespace PagarMe\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;

class CardContext extends BasicContext
{
    private $createdCard;
    private $queryCard;

    /**
     * @Given I register a card with :number, :holder and :expiration
     */
    public function aCardWithAnd($number, $holder, $expiration)
    {
        $this->createdCard = self::getPagarMe()
            ->card()
            ->create($number, $holder, $expiration);
    }


    /**
     * @Then I should have a card starting with :start and ending with :end
     */
    public function iShouldHaveACardStartingWithAndEndingWith($start, $end)
    {
        assertEquals($start, $this->createdCard->getFirstDigits());
        assertEquals($end, $this->createdCard->getLastDigits());
    }

    /**
     * @When I query for the card
     */
    public function iQueryForCard()
    {
        $cardId = $this->createdCard->getId();

        $this->queryCard = self::getPagarMe()
            ->card()
            ->get($cardId);
    }

    /**
     * @Then I should have the same card
     */
    public function iShouldHaveTheSameCard()
    {
        assertEquals($this->createdCard, $this->queryCard);
    }
}
