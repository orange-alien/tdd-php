<?php

namespace src;

class Dollar extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier) : Money
    {
        return new Money($this->amount * $multiplier);
    }
}