<?php

namespace Tests\Service;

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
        $this->assertFalse($this->order->removePizza($pepperoni));
    }

    public function testCalculateTotalAmount()
    {
        $this->order->addPizza($this->pizza);
        $this->assertEquals(10.5, $this->order->calculateTotalAmount());
    }
}