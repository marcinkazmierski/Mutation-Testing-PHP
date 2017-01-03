<?php
declare(strict_types = 1);

namespace Food;

interface PizzaInterface
{
    public function getPrice():float;

    public function getToppings():array;
}