<?php

namespace src;

class PairMap
{
    protected array $map = [];

    public function __construct()
    {
    }

    protected function key(Pair $pair) : string
    {
        return $pair->from . '_' . $pair->to;
    }

    public function put(Pair $pair, int $value) : void
    {
        $key = $this->key($pair);
        $this->map[$key] = $value;
    }

    public function get(Pair $pair) : int
    {
        $key = $this->key($pair);
        return $this->map[$key];
    }
}