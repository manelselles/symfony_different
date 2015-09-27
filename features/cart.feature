@cart
Feature: Product cart
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket

  Rules:
  - VAT is 21%
  #- Delivery cost for a basket > £10 is £2
  #- Delivery cost for a basket < £10 is £3

  Scenario: Buying a single product
    Given there is a "button 5cm black", which costs 5 euros
    When I add the "button 5cm black" to the cart
    Then I should have 1 product in the cart
    And the overall cart price should be 6.05 euros