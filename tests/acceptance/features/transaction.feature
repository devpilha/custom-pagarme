Feature: Customer
 Como cliente da Pagar.me integrando uma aplicação PHP
 Eu quero uma camada de abstração
 Para que eu possa realizar transações
  Scenario Outline: Creating a Credit Card Transaction
    Given a valid customer
    And register a card with "<number>", "<holder>" and "<expiration>"
    And make a credit card transaction with "<amount>" and "<installments>"
    Then a valid transaction must be created
    Examples:
      |       number        |     holder    | expiration |  amount  | installments  |
      |  4916686854918357   |  João Silva   |    0623    |  20000   |       1       |
      |  5423291241332322   |  Maria Silva  |    0623    |  9900    |       7       |
      |  30025079488046     |  Pedro Silva  |    0623    |  250     |       3       |
      |  372780906958878    |  Cesar Silva  |    0623    |  1337    |       12      |
      |  6062828347922862   |  Carla Silva  |    0623    |  123456  |       10      |
      |  6363689025822139   |  Marta Silva  |    0623    |  1000001 |       1       |

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
