Feature: Customer
 Como cliente da Pagar.me integrando uma aplicação PHP
 Eu quero uma camada de abstração
 Para que eu possa realizar transações

  Scenario Outline: Creating a Transaction
    Given a valid customer
    And register a card with "<number>", "<holder>" and "<expiration>"
    And make a credit card transaction with "<amount>"
    Then a valid transaction must be created
    Examples:
      |       number        |     holder    | expiration |  amount  |
      |  4916686854918357   |  João Silva   |    0623    |  20000   |
      |  5423291241332322   |  Maria Silva  |    0623    |  9900    |
      |  30025079488046     |  Pedro Silva  |    0623    |  250     |
      |  372780906958878    |  Cesar Silva  |    0623    |  1337    |
      |  6062828347922862   |  Carla Silva  |    0623    |  123456  |
      |  6363689025822139   |  Marta Silva  |    0623    |  1000001 |

  Scenario Outline: Creating a Transaction
    Given a valid customer
    And make a boleto transaction with "<amount>"
    Then a valid transaction must be created
    Examples:
      |  amount  |
      |  123456  |
      |  1000001 |
