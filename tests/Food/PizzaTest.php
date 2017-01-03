<?php
namespace Tests\Food;

use PHPUnit\Framework\TestCase;
use Food\Pizza;

class ControllerTest extends TestCase
{
    public function testPrice()
    {
        $pizza = new Pizza();
        $this->assertEquals(10.5, $pizza->getPrice());
    }
}