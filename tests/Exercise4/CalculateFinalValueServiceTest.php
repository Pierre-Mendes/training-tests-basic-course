<?php

namespace Exercise4;

use App\Product;
use App\ShoppingCart;
use App\User;
use Interfaces\ShippingInterface;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Services\CalculateFinalValueService;

class CalculateFinalValueServiceTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testTotalValueWithShippingWhenLessThan100(): void
    {
        $shippingInterfaceMock = $this->createMock(ShippingInterface::class);
        $shippingInterfaceMock->expects($this->once())
            ->method('calculateShipping')
            ->with('12345678')
            ->willReturn(15.00);

        $product = new Product('Book', 20);
        $user = new User('Ana', '12345678');
        $shoppingCart = new ShoppingCart($user);
        $shoppingCart->addProduct($product, 2);

        $service = new CalculateFinalValueService($shippingInterfaceMock);
        $this->assertEquals(55.00, $service->execute($shoppingCart));
    }

    /**
     * @throws Exception
     */
    public function testTotalValueWithoutShippingWhenGreaterOrEqualTo100(): void
    {
        $shippingInterfaceMock = $this->createMock(ShippingInterface::class);
        $shippingInterfaceMock->expects($this->never())
            ->method('calculateShipping');

        $product = new Product('Headphone', 120);
        $user = new User('Lucas', '87654321');
        $shoppingCart = new ShoppingCart($user);
        $shoppingCart->addProduct($product, 1);

        $service = new CalculateFinalValueService($shippingInterfaceMock);
        $this->assertEquals(120.00, $service->execute($shoppingCart));
    }
}
