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
        $this->assertEquals(11.5 - AmountDiscountPizza::AMOUNT_OF_DISCOUNT, $pepperoniWithDiscount->getPrice());
    }

    public function testToppings()
    {
        $pizza = new Pizza();
        $pepperoni = new PepperoniPizza($pizza);
        $pepperoniWithDiscount = new AmountDiscountPizza($pepperoni);
        $this->assertEquals(['cheese', 'pepperoni'], $pepperoniWithDiscount->getToppings());
    }

    /**
     * Wystarczy ten test zakomentować by pokrycie kodu testami nadal miało 100% a humbug wurzucił nam 'covered mutants were not detected'!
     */
    public function testAmountDiscountPizza()
    {
        $pizza = $this->createMock(Pizza::class);
        $pizza->method('getPrice')
            ->willReturn(AmountDiscountPizza::AMOUNT_FOR_DISCOUNT);
        $pizzaWithDiscount = new AmountDiscountPizza($pizza);
        $this->assertEquals(AmountDiscountPizza::AMOUNT_FOR_DISCOUNT - AmountDiscountPizza::AMOUNT_OF_DISCOUNT, $pizzaWithDiscount->getPrice());
    }
}