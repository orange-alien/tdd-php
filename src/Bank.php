<?php

namespace src;

use src\Interfaces\Expression;

class Bank
{
    protected PairMap $rates;

    public function __construct(
    )
    {
        $this->rates = new PairMap();
    }

    public function reduce(Expression $source, String $to) : Money
    {
        return $source->reduce($this, $to);
    }

    public function addRate(String $from, String $to, int $rate) : void
    {
        $pair = new Pair($from, $to);
        $this->rates->put($pair, $rate);
    }

    public function rate(String $from , String $to) : int
    {
        if($from === $to) {
            return 1;
        }

        $pair = new Pair($from, $to);
        return $this->rates->get($pair);
    }
}