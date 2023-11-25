<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $five.times(2);
        assertEquals(10, $five->amount);
    }

}