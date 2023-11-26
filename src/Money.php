<?php

namespace src;

abstract class Money
{
    protected int $amount;
    protected string $currency;

    abstract function times(int $multiplier) : Money;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amoun;
        $this->currency = $currency;
    }

    public function currency(): string
    {
        return $this->currency();
    }

    public function equals(Money $money) : bool
    {
        return $this->amount === $money->amount
                && get_class($this) === get_class($money);
    }

    public static function dollar(int $amount) : Money
    {
        return new Dollar($amount, 'USD');
    }

    public static function franc(int $amount) : Money
    {
        return new Franc($amount, 'CHF');
    }
}