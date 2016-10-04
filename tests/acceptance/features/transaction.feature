Feature: Transaction
 Como cliente da Pagar.me integrando uma aplicação PHP
 Eu quero uma camada de abstração
 Para que eu possa realizar transações

  Scenario Outline: Create and capture a Credit Card Transaction
    Given a valid customer
    And register a card with "<number>", "<holder>" and "<expiration>"
    And make a credit card transaction with "<amount>" and "<installments>"
    Then a paid transaction must be created
    Examples:
      |       number        |     holder    | expiration |  amount  | installments  |
      |  4556425889100276   |  João Silva   |    0623    |  20000   |       1       |
      |  5435375979338399   |  Maria Silva  |    0623    |  9900    |       7       |
      |  30171632321686     |  Pedro Silva  |    0623    |  250     |       3       |
      |  341611978581611    |  Cesar Silva  |    0623    |  1337    |       12      |
      |  6062825718246608   |  Carla Silva  |    0623    |  123456  |       10      |
      |  6363685469431429   |  Marta Silva  |    0623    |  1000001 |       1       |

  Scenario Outline: Authorize a Credit Card Transaction
    Given a valid customer
    And register a card with "<number>", "<holder>" and "<expiration>"
    And authorize a credit card transaction with "<amount>" and "<installments>"
    Then a authorized transaction must be created
    Examples:
      |       number        |     holder    | expiration |  amount  | installments  |
      |  4556655568781331   |  João Silva   |    0623    |  20000   |       1       |
      |  5312843659611045   |  Maria Silva  |    0623    |  9900    |       7       |
      |  38207356445228     |  Pedro Silva  |    0623    |  250     |       3       |
      |  371604330597394    |  Cesar Silva  |    0623    |  1337    |       12      |
      |  6062824410079680   |  Carla Silva  |    0623    |  123456  |       10      |
      |  5041754485700738   |  Marta Silva  |    0623    |  1000001 |       1       |

  Scenario Outline: Authorize and capture a Credit Card Transaction
    Given a valid customer
    And register a card with "<number>", "<holder>" and "<expiration>"
    And authorize a credit card transaction with "<amount>" and "<installments>"
    And capture the transaction
    Then a paid transaction must be created
    Examples:
      |       number        |     holder    | expiration |  amount  | installments  |
      |  4539927448873758   |  João Silva   |    0623    |  20000   |       1       |
      |  5475972816746627   |  Maria Silva  |    0623    |  9900    |       7       |
      |  30323500265699     |  Pedro Silva  |    0623    |  250     |       3       |
      |  371733354333913    |  Cesar Silva  |    0623    |  1337    |       12      |
      |  6062822300852208   |  Carla Silva  |    0623    |  123456  |       10      |
      |  4514161325131598   |  Marta Silva  |    0623    |  1000001 |       1       |

  Scenario Outline: Authorize and capture different values
    Given a valid customer
    And register a card with "<number>", "<holder>" and "<expiration>"
    And authorize a credit card transaction with "<amount>" and "<installments>"
    And capture the transaction with amount "<capture>"
    Then a paid transaction must be created with "<capture>" paid amount
    Examples:
      |       number        |     holder    | expiration |  amount  | installments  | capture |
      |  4556111382970890   |  João Silva   |    0623    |  20000   |       1       |  14900  |
      |  5157798910157725   |  Maria Silva  |    0623    |  9900    |       7       |  9899   |
      |  30257387840192     |  Pedro Silva  |    0623    |  250     |       3       |  230    |
      |  345066740083873    |  Cesar Silva  |    0623    |  1337    |       12      |  509    |
      |  6062827431932910   |  Carla Silva  |    0623    |  123456  |       10      |  78910  |
      |  4514164981119485   |  Marta Silva  |    0623    |  1000001 |       1       |  10001  |

  Scenario Outline: Creating a Boleto Transaction
    Given a valid customer
    And make a boleto transaction with "<amount>"
    Then a valid transaction must be created
    Examples:
      |  amount  |
      |  123456  |
      |  1000001 |

  Scenario: Retrieving a Credit Card Transaction
    Given a valid customer
    And a valid card
    And a valid credit card transaction
    Then then transaction must be retriavable

  Scenario: Retrieving a Boleto Transaction
    Given a valid customer
    And a valid boleto transaction
    Then then transaction must be retriavable

  Scenario: Getting transactions
    Given I had multiple transactions registered
    When query transactions
    Then an array of transactions must be returned
