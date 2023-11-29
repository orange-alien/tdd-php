<?php

namespace src;

use src\Interfaces\Expression;

class Bank
{
    public function reduce(Expression $source, String $to) : Money
    {
        return $source->reduce($to);
    }
}