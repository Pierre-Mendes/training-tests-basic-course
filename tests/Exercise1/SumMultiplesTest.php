<?php

namespace Tests\Exercise1;

use App\SumMultiples;
use PHPUnit\Framework\TestCase;

class SumMultiplesTest extends TestCase
{
    private SumMultiples $sumMultiples;

    protected function setUp(): void
    {
        $this->sumMultiples = new SumMultiples();
    }

    public function testBasicExample(): void
    {
        $result = $this->sumMultiples->sumMultiplesNumbers([3, 5], 10, false);
        $this->assertEquals(23, $result, 'Failed in the base case (3 or 5 below 10)');
    }

    // 1. Test for multiples of 3 or 5 below 1000
    public function testMultiplesOf3Or5Below1000(): void
    {
        $result = $this->sumMultiples->sumMultiplesNumbers([3, 5], 1000, false);
        $this->assertEquals(233168, $result, 'Failed to add multiples of 3 or 5 below 1000');
    }

    // 2. Test for multiples of 3 and 5 below 1000 (multiples of 15)
    public function testMultiplesOf3And5Below1000(): void
    {
        $result = $this->sumMultiples->sumMultiplesNumbers([3, 5], 1000, true);
        $this->assertEquals(33165, $result, 'Failed to sum multiples of 3 and 5 below 1000');
    }

    // 3. Test for multiples of (3 or 5) and 7 below 1000
    public function testMultiplesOf3Or5And7Below1000(): void
    {
        $expected = 0;
        for ($i = 1; $i < 1000; $i++) {
            if ($i % 7 === 0 && ($i % 3 === 0 || $i % 5 === 0)) {
                $expected += $i;
            }
        }

        $sum21 = $this->sumMultiples->sumMultiplesNumbers([21], 1000, false);
        $sum35 = $this->sumMultiples->sumMultiplesNumbers([35], 1000, false);
        $sum105 = $this->sumMultiples->sumMultiplesNumbers([105], 1000, false);
        $alternativeExpected = $sum21 + $sum35 - $sum105;
        $result = $this->sumMultiples->sumMultiplesOfAAndBorC(7, 3, 5, 1000);

        $multiplesOf7 = [];
        for ($i = 7; $i < 1000; $i += 7) {
            $multiplesOf7[] = $i;
        }

        $filtered = array_filter($multiplesOf7, static function ($num) {
            return ($num % 3 === 0) || ($num % 5 === 0);
        });

        $filteredSum = array_sum($filtered);

        $this->assertEquals(33173, $result, 'sumMultiplesOfAAndBorC failed');
        $this->assertEquals(33173, $expected, 'Manual calculation failed');
        $this->assertEquals($expected, $alternativeExpected, 'Mathematical verification failed');
        $this->assertEquals($expected, $filteredSum, 'Filter approach failed');
    }

    // Additional tests to validate the algorithm
    public function testEmptyDivisorsReturnsZero(): void
    {
        $result = $this->sumMultiples->sumMultiplesNumbers([], 100, false);
        $this->assertEquals(0, $result, 'Should return 0 for empty divisors');
    }

    public function testLimitLowerThanSmallestDivisorReturnsZero(): void
    {
        $result = $this->sumMultiples->sumMultiplesNumbers([3, 5], 2, false);
        $this->assertEquals(0, $result, 'Should return 0 when limit is less than smallest divisor');
    }

    public function testSingleDivisor(): void
    {
        $result = $this->sumMultiples->sumMultiplesNumbers([3], 10, false);
        $this->assertEquals(3 + 6 + 9, $result, 'Failed in case of single divisor');
    }

    public function testRequireAllDivisorsWithSingleDivisor(): void
    {
        $result = $this->sumMultiples->sumMultiplesNumbers([3], 10, true);
        $this->assertEquals(3 + 6 + 9, $result, 'Failed in case of single divisor with requireAll=true');
    }

    public function testEdgeCaseWithLimitEqualToOne(): void
    {
        $result = $this->sumMultiples->sumMultiplesNumbers([3, 5], 1, false);
        $this->assertEquals(0, $result, 'Should return 0 when limit is 1');
    }
}
