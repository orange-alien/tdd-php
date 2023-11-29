<?php

namespace src\Interfaces;

use src\Money;

interface Expression
{
    public function reduce(string $to) : Money;
}