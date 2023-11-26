<?php

use PHPUnit\Framework\TestCase;
use src\Dollar;

use function PHPUnit\Framework\assertEquals;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    public function testEquality()
    {
        $this->assertTrue( (new Dollar(5))->equals( new Dollar(5) ) );
        $this->assertFalse( (new Dollar(5))->equals( new Dollar(6) ) );
    }
}