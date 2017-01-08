<?php
declare(strict_types = 1);

namespace Service;

use Food\PizzaInterface;

class Order
{
    /** @var array */
    private $pizzaCollection;

    public function __construct()
    {
        $this->pizzaCollection = [];
    }

    public function addPizza(PizzaInterface $pizza)
    {
        $this->pizzaCollection[] = $pizza;
    }

    public function removePizza(PizzaInterface $pizza)
    {
        $key = array_search($pizza, $this->pizzaCollection);

        if ($key === false) {
            return false;
        }

        unset($this->pizzaCollection[$key]);

        return true;
    }

    public function getAllPizza()
    {
        return $this->pizzaCollection;
    }

    public function calculateTotalAmount()
    {
        $totalAmount = 0;
        /** @var $pizza PizzaInterface */
        foreach ($this->pizzaCollection as $pizza) {
            $totalAmount += $pizza->getPrice();
        }
        return $totalAmount;
    }
}