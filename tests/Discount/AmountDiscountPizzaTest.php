<?php
namespace Tests\Discount;

use Discount\AmountDiscountPizza;
use Food\PepperoniPizza;
use Food\Pizza;
use PHPUnit\Framework\TestCase;

class AmountDiscountPizzaTest extends TestCase
{
    public function testPrice()
    {
        $pizza = new Pizza();
        $pepperoni = new PepperoniPizza($pizza);
        $pepperoniWithDiscount = new AmountDiscountPizza($pepperoni);
        $this->assertEquals(14.5, $pepperoniWithDiscount->getPrice());
    }

    public function testToppings(){
        $pizza = new Pizza();
        $pepperoni = new PepperoniPizza($pizza);
        $pepperoniWithDiscount = new AmountDiscountPizza($pepperoni);
        $this->assertEquals(['cheese', 'pepperoni'], $pepperoniWithDiscount->getToppings());
    }
}