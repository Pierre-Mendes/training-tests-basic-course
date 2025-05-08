<?php

namespace App;

class SumMultiples
{
    public function sumMultiplesNumbers(array $divisors, int $limit, bool $requireAllDivisors = false): int
    {
        if (empty($divisors) || $limit < 2) {
            return 0;
        }

        $sum = 0;

        for ($number = 1; $number < $limit; $number++) {
            if ($this->isMultiple($number, $divisors, $requireAllDivisors)) {
                $sum += $number;
            }
        }

        return $sum;
    }

    public function sumMultiplesOfAAndBorC(int $a, int $b, int $c, int $limit): int
    {
        $sum = 0;
        for ($i = $a; $i < $limit; $i += $a) {
            if ($i % $b === 0 || $i % $c === 0) {
                $sum += $i;
            }
        }
        return $sum;
    }

    private function isMultiple(int $number, array $divisors, bool $requireAll): bool
    {
        foreach ($divisors as $divisor) {
            if ($number % $divisor === 0) {
                if (!$requireAll) {
                    return true;
                }
            } elseif ($requireAll) {
                return false;
            }
        }

        return $requireAll;
    }
}
