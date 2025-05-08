<?php

namespace Exercise2;

use App\HappyNumberChecker;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class HappyNumberCheckerTest extends TestCase
{
    public function testCheckHappyNumber(): void
    {
        $checker = new HappyNumberChecker();
        $this->assertTrue($checker->isHappy(7));
        $this->assertFalse($checker->isHappy(4));
    }

    public function testEdgeCases(): void
    {
        $checker = new HappyNumberChecker();

        $this->assertTrue($checker->isHappy(1));
        $this->assertFalse($checker->isHappy(0));
        $this->assertTrue($checker->isHappy(19));
        $this->assertFalse($checker->isHappy(20));
    }

    public function testNegativeNumber(): void
    {
        $checker = new HappyNumberChecker();
        $this->expectException(InvalidArgumentException::class);
        $checker->isHappy(-7);
    }

    public function testDetectLoops(): void
    {
        $checker = new HappyNumberChecker();
        $this->assertTrue($checker->isHappy(7));
        $this->assertFalse($checker->isHappy(4));

        // Testign other cases
        $this->assertTrue($checker->isHappy(1));
        $this->assertTrue($checker->isHappy(10));
        $this->assertFalse($checker->isHappy(2));
        $this->assertFalse($checker->isHappy(16));
    }
}
