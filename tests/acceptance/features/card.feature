Feature: Cards
  Como cliente da Pagar.me integrando uma aplicação PHP
  Eu quero uma camada de abstração
  Para que eu possa gerenciar cartoes de crédito

  Scenario Outline: Registering credit cards
    Given I register a card with "<number>", "<holder>" and "<expiration>"
    Then I should have a card starting with <start> and ending with <end>

    Examples:
      |       number        |     holder    | expiration |  start | end  |
      |  4916686854918357   |  João Silva   |    0623    | 491668 | 8357 |
      |  5423291241332322   |  Maria Silva  |    0623    | 542329 | 2322 |
      |  30025079488046     |  Pedro Silva  |    0623    | 300250 | 8046 |
      |  372780906958878    |  Cesar Silva  |    0623    | 372780 | 8878 |
      |  6062828347922862   |  Carla Silva  |    0623    | 606282 | 2862 |
      |  6363689025822139   |  Marta Silva  |    0623    | 636368 | 2139 |

  Scenario Outline: Registering credit cards
    Given I register a card with "<number>", "<holder>" and "<expiration>"
    When I query for the card
    Then I should have the same card

    Examples:
      |       number        |     holder    | expiration |
      |  4916686854918357   |  João Silva   |    0623    |
      |  5423291241332322   |  Maria Silva  |    0623    |
      |  30025079488046     |  Pedro Silva  |    0623    |
      |  372780906958878    |  Cesar Silva  |    0623    |
      |  6062828347922862   |  Carla Silva  |    0623    |
      |  6363689025822139   |  Marta Silva  |    0623    |
