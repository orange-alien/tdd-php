<?php

use PHPUnit\Framework\TestCase;
use src\Bank;
use src\Money;
use src\Pair;
use src\PairMap;
use src\Sum;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;

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
        $this->assertFalse( (Money::Franc(5))->equals( Money::dollar(5) ) );
    }

    public function testCurrency()
    {
        $this->assertEquals('USD', (Money::dollar(1))->currency() );
        $this->assertEquals('CHF', (Money::franc(1))->currency() );
    }

    public function testSimpleAddtion()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(10), $reduced);
    }

    public function testPlusReturnsSum()
    {
        $five = Money::dollar(5);
        $result = $five->plus($five);
        assert($result instanceof Sum);
        $sum = $result;
        $this->assertEquals($five, $sum->augend);
        $this->assertEquals($five, $sum->addend);
    }

    public function testReduceSum()
    {
        $sum = new Sum( Money::dollar(3), Money::dollar(4) );
        $bank = new Bank();
        $result = $bank->reduce($sum, 'USD');
        assertEquals(Money::dollar(7), $result);
    }

    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce( Money::dollar(1), 'USD' );
        assertEquals( Money::dollar(1), $result );
    }

    public function testReduceMoneyDifferentCurrency()
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce( Money::franc(2), 'USD' );
        assertEquals( Money::dollar(1), $result );
    }

    public function testIdentityRate()
    {
        assertEquals(1, (new Bank())->rate('USD','USD') );
    }






    public function testPair()
    {
        $pair = new Pair('a', 'b');
        assertEquals( $pair, new Pair('a', 'b') );
        assertNotEquals( $pair, new Pair('b', 'a') );

        assertEquals('a', $pair->from);
        assertEquals('b', $pair->to);
        assertEquals('a, b', $pair->__toString());

    }

    public function testMap()
    {
        $pair = new Pair('a', 'b');
        $map  = new PairMap();
        $map->put($pair, 1);
        $value = $map->get($pair);
        assertEquals($value, 1);
        assertNotEquals($value, 2);
    }
}