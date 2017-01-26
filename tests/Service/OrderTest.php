<?php

namespace Tests\Service;

use Discount\AmountDiscountPizza;
use Food\PepperoniPizza;
use Food\Pizza;
use Food\PizzaInterface;
use PHPUnit\Framework\TestCase;
use Service\Order;

class OrderTest extends TestCase

{
    /** @var  Order */
    protected $order;

    /** @var  PizzaInterface */
    protected $pizza;

    public function setUp()
    {
        $this->order = new Order();
        $this->pizza = new Pizza();
    }

    public function testAddPizza()
    {
        $this->order->addPizza($this->pizza);
        $this->assertNotEmpty($this->order->getAllPizza());
        $this->assertEquals([$this->pizza], $this->order->getAllPizza());
    }

    public function testRemovePizza()
    {
        $pepperoni = new PepperoniPizza($this->pizza);

        $this->order->addPizza($this->pizza);
        $this->order->addPizza($pepperoni);

        $this->assertTrue($this->order->removePizza($pepperoni));
        $this->assertEquals([$this->pizza], $this->order->getAllPizza());
    }

    public function testRemovePizzaNotExist()
    {
        $pepperoni = new PepperoniPizza($this->pizza);
        $this->order->removePizza($pepperoni);
        $this->assertFalse($this->order->removePizza($pepperoni));
    }

    public function testCalculateTotalAmount()
    {
        $pizzaWithDiscount = new AmountDiscountPizza($this->pizza);
        $pepperoni = new PepperoniPizza($this->pizza);
        $pepperoniWithDiscount = new AmountDiscountPizza($pepperoni);

        $this->order->addPizza($pepperoniWithDiscount);
        $this->order->addPizza($pizzaWithDiscount);
        $this->order->addPizza($this->pizza);
        $this->assertEquals(32.5 - AmountDiscountPizza::AMOUNT_OF_DISCOUNT, $this->order->calculateTotalAmount());
    }
}