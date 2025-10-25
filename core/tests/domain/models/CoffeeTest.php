<?php

namespace core\tests\domain\models;

use core\domain\models\Coffee;
use Exception;

class CoffeeTest extends \PHPUnit\Framework\TestCase
{
    public function testCoffeeCreation()
    {
        $coffee = Coffee::from('Espresso', 2.50);

        $this->assertEquals('Espresso', $coffee->getType());

        $this->assertEquals(2.50, $coffee->getPrice());
    }

    public function testAnotherTypeValidation()
    {
        $this->expectException(Exception::class);
        Coffee::from('green_tea', 1.75);
    }
}
