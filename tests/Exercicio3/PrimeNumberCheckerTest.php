<?php

namespace Exercicio3;

use App\PrimeNumberChecker;
use PHPUnit\Framework\TestCase;

class PrimeNumberCheckerTest extends TestCase
{
    public function testIsPrime(): void
    {
        $checker = new PrimeNumberChecker();

        $this->assertFalse($checker->isPrime(0));
        $this->assertFalse($checker->isPrime(1));
        $this->assertTrue($checker->isPrime(2));
        $this->assertTrue($checker->isPrime(3));
        $this->assertFalse($checker->isPrime(4));
        $this->assertTrue($checker->isPrime(5));
    }
}
