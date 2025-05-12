<?php

namespace Interfaces;

interface ShippingInterface
{
    public function calculateShipping(string $zipCode): float;
}
