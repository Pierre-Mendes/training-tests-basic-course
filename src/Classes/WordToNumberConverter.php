<?php

namespace App;

class WordToNumberConverter
{
    public function convert(string $word): int
    {
        $sum = 0;
        $word = preg_replace('/[^a-zA-Z]/', '', $word);

        foreach (str_split($word) as $char) {
            if (ctype_lower($char)) {
                $sum += ord($char) - ord('a') + 1;
            } else {
                $sum += ord($char) - ord('A') + 27;
            }
        }

        return $sum;
    }
}
