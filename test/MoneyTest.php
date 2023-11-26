<?php

use PHPUnit\Framework\TestCase;
use src\Dollar;
use src\Franc;
use src\Money;

use function PHPUnit\Framework\assertEquals;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality()
    {
        $this->assertTrue( (Money::dollar(5))->equals( Money::dollar(5) ) );
        $this->assertFalse( (Money::dollar(5))->equals( Money::dollar(6) ) );
        $this->assertTrue( (Money::Franc(5))->equals( Money::Franc(5) ) );
        $this->assertFalse( (Money::Franc(5))->equals( Money::Franc(6) ) );
        $this->assertFalse( (Money::Franc(5))->equals( Money::dollar(5) ) );
    }

    public function testFrancMultiplication()
    {
        $five = Money::Franc(5);
        $this->assertEquals(Money::Franc(10), $five->times(2));
        $this->assertEquals(Money::Franc(15), $five->times(3));
    }

    public function testCurrency()
    {
        assertEquals('USD', (Money::dollar(1))->currency() );
        assertEquals('CHF', (Money::franc(1))->currency() );
    }
}