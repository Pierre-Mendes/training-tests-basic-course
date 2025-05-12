<?php

namespace App;

class Product
{
    public function __construct(
        public string $name,
        public float $value
    ) {}
}
