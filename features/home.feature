Feature: Showing content in home
  #In order to be more confident in making a purchase
  #As a customer
  #I need VAT and a cost of delivery to be calculated for my basket

  #Rules:
  #- VAT is 20%
  #- Delivery cost for a basket > £10 is £2
  #- Delivery cost for a basket < £10 is £3

  @critical
  Scenario: User see highlights at home
    Given there is a highlight with title "title_test" and a description "description_test"
    When I open the homepage
    Then I should see the highlight title "title_test"