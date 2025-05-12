<?php

namespace App;

class ShoppingCart
{
    private array $items = [];

    public function __construct(
        private readonly User $user
    ) {}

    public function addProduct(Product $product, int $amount): void
    {
        if ($amount <= 0) {
            unset($this->items[$product->name]);
            return;
        }

        $this->items[$product->name] = [
            'product' => $product,
            'amount' => $amount
        ];
    }

    public function removeProduct(string $nameProduct): void
    {
        unset($this->items[$nameProduct]);
    }

    public function getTotalValue(): float
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->value * $item['amount'];
        }

        return $total;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
