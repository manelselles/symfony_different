<?php

use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class CartContext implements Context
{
    public function __construct()
    {
        $this->cart = array();
        $this->product = array();
    }

    /**
     * @Given there is a :product, which costs :cost euros
     */
    public function thereIsAWhichCostsEuros($product, $cost)
    {
        $this->product = [
            'product' => $product,
            'cost' => $cost
        ];
    }

    /**
     * @When I add the :product to the cart
     */
    public function iAddTheToTheCart($product)
    {
        $this->cart[] = $this->product;
    }

    /**
     * @Then I should have :count product in the cart
     */
    public function iShouldHaveProductInTheCart($count)
    {
        PHPUnit_Framework_Assert::assertEquals(
            $count,
            count($this->cart)
        );
    }

    /**
     * @Then the overall cart price should be :totalPrice euros
     */
    public function theOverallCartPriceShouldBeEuros($totalPrice)
    {
        $totalAmount = 0;
        foreach($this->cart as $productCart) {
            $totalAmount += $productCart['cost'];
        }

        $totalAmountWithTaxes = 1.21 * $totalAmount;
        $totalAmountWithTaxes = number_format($totalAmountWithTaxes, 2);

        PHPUnit_Framework_Assert::assertEquals(
            $totalPrice,
            $totalAmountWithTaxes
        );
    }
}
