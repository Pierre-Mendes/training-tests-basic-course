<?php

namespace Services;

use App\ShoppingCart;
use Interfaces\ShippingInterface;

readonly class CalculateFinalValueService
{
    public function __construct(
        private ShippingInterface $shipping
    ) {}

    public function execute(ShoppingCart $shoppingCart): float
    {
        $totalValue = $shoppingCart->getTotalValue();
        if ($totalValue < 100) {
            $calculatedShipping = $this->shipping->calculateShipping($shoppingCart->getUser()->zipCode);

            return $totalValue + $calculatedShipping;
        }

        return $totalValue;
    }
}
