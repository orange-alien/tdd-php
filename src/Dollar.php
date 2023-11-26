<?php

namespace src;

class Dollar
{
    public $amount;

    public function __construct(int $amount)
    {

    }

    public function times(int $multiplier) : void
    {
        $this->amount =  5 * 2;
    }
}