<?php

namespace src\Interfaces;

use src\Bank;
use src\Money;

interface Expression
{
    public function plus(Expression $addend) : mixed;
    public function reduce(Bank $bank, string $to) : Money;
}