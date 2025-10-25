<?php

namespace core\tests\domain\models;

use core\domain\models\Coffee;

class CoffeeTest extends \PHPUnit\Framework\TestCase
{
    public function testCoffeeCreation()
    {
        $coffee = Coffee::from('Espresso', 2.50);

        $this->assertEquals('Espresso', $coffee->getType());

        $this->assertEquals(2.50, $coffee->getPrice());
    }
}
