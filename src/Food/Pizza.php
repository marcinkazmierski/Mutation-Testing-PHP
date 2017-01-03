<?php
declare(strict_types = 1);

namespace Food;


class Pizza implements PizzaInterface
{
    public function getPrice():float
    {
        return 10.50;
    }

    public function getToppings():array
    {
        return [
            'cheese',
        ];
    }
}