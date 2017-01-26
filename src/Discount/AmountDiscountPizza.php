<?php

declare(strict_types = 1);

namespace Discount;

use Food\PizzaInterface;

class AmountDiscountPizza implements PizzaInterface
{
    /**
     * @var PizzaInterface
     */
    private $pizza;

    const AMOUNT_FOR_DISCOUNT = 10.55;

    const AMOUNT_OF_DISCOUNT = 1.25;

    public function __construct(PizzaInterface $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getPrice():float
    {
        if ($this->pizza->getPrice() < self::AMOUNT_FOR_DISCOUNT) {
            return $this->pizza->getPrice();
        }
        return $this->pizza->getPrice() - self::AMOUNT_OF_DISCOUNT;
    }

    public function getToppings():array
    {
        return $this->pizza->getToppings();
    }
}