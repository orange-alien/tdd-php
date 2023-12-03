<?php

namespace src;

class Pair
{
    public function __construct(
        public readonly string $from,
        public readonly string $to,
    )
    {
    }

    public function equals(Pair $pair)
    {
        return $this->from === $pair->from
                && $this->to === $pair->to;
    }

    public function hashCode() : int
    {
        return 0;
    }

    public function __toString() : string
    {
        return "{$this->from}, {$this->to}";
    }

}