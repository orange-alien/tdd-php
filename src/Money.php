<?php

namespace src;

use Stringable;

class Money implements Stringable
{
    protected int $amount;
    protected string $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times(int $multiplier) : Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Money $added) : Money
    {
        return new Money($this->amount + $added->amount, $this->currency);
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function equals(Money $money) : bool
    {
        return $this->amount === $money->amount
                && $this->currency() === $money->currency();
    }

    public static function dollar(int $amount) : Money
    {
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount) : Money
    {
        return new Money($amount, 'CHF');
    }

    public function __toString()
    {
        return $this->amount . ' ' . $this->currency;
    }
}