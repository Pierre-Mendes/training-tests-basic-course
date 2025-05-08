<?php

namespace App;

use InvalidArgumentException;

class HappyNumberChecker
{
    public function isHappy(int $number): bool
    {
        if ($number < 0) {
            throw new InvalidArgumentException('Number must be non-negative');
        }

        if ($number === 0) {
            return false;
        }

        $seen = [];

        while ($number !== 1 && !isset($seen[$number])) {
            $seen[$number] = true;
            $number = $this->sumOfSquaredDigits($number);
        }

        return $number === 1;
    }

    private function sumOfSquaredDigits(int $number): int
    {
        $sum = 0;
        while ($number > 0) {
            $digit = $number % 10;
            $sum += $digit * $digit;
            $number = (int) ($number / 10);
        }
        return $sum;
    }
}
