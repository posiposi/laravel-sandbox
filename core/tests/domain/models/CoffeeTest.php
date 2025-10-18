<?php

namespace core\tests\domain\models;

use core\domain\models\Coffee;

class CoffeeTest extends \PHPUnit\Framework\TestCase
{
    public function testCoffeeCreation()
    {
        $coffee = Coffee::from('Espresso', 2.50);

        // カバレッジを意図的に落とすためにアサーション対象は一つだけ
        $this->assertEquals('Espresso', $coffee->getType());
    }
}
