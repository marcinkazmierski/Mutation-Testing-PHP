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
        return $this->pizza->getPrice() + 1.00;
    }

    public function getToppings():array
    {
        return array_merge($this->pizza->getToppings(), ['pepperoni']);
    }
}