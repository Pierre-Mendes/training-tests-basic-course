<?php

namespace Exercise4;

use App\Product;
use App\ShoppingCart;
use App\User;
use PHPUnit\Framework\TestCase;

class ShoppingCartTest extends TestCase
{
    public function testEmptyShoppingCartMustReturnZero(): void
    {
        $shoppingCart = new ShoppingCart(new User('João', '12345678'));
        $this->assertEquals(0, $shoppingCart->getTotalValue());
    }

    public function testAddNewProduct(): void
    {
        $product = new Product('Keyboard', 50);
        $shoppingCart = new ShoppingCart(new User('João', '12345678'));
        $shoppingCart->addProduct($product, 2);
        $this->assertEquals(100, $shoppingCart->getTotalValue());
    }

    public function testRemoveProduct(): void
    {
        $product = new Product('Keyboard', 50);
        $shoppingCart = new ShoppingCart(new User('João', '12345678'));
        $shoppingCart->addProduct($product, 2);
        $shoppingCart->removeProduct('Keyboard');
        $this->assertEquals(0, $shoppingCart->getTotalValue());
    }

    public function testIfUpdateAmountToZeroMustRemoveProduct(): void
    {
        $product = new Product('headset', 25);
        $shoppingCart = new ShoppingCart(new User('João', '12345678'));
        $shoppingCart->addProduct($product, 1);
        $shoppingCart->addProduct($product, 0);
        $this->assertEquals(0, $shoppingCart->getTotalValue());
    }
}
