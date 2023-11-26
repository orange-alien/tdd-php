<?php

namespace src;

class Dollar extends Money
{
    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency == 'USD';
    }

    public function times(int $multiplier) : Money
    {
        return Dollar::dollar($this->amount * $multiplier);
    }

}