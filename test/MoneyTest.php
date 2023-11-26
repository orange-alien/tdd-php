<?php

use PHPUnit\Framework\TestCase;
use src\Dollar;

use function PHPUnit\Framework\assertEquals;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $product = $five->times(2);
        assertEquals(10, $product->amount);
        $product = $five->times(3);
        assertEquals(15, $product->amount);
    }

}