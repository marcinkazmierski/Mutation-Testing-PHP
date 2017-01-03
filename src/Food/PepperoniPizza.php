<?php
declare(strict_types = 1);

namespace Food;


class PepperoniPizza implements PizzaInterface
{
    /**
     * @var PizzaInterface
     */
    private $pizza;

    public function __construct(PizzaInterface $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getPrice():float
    {
        return $this->pizza->getPrice() + 5.00;
    }

    public function getToppings():array
    {
        return $this->pizza->getToppings() + ['pepperoni'];
    }
}