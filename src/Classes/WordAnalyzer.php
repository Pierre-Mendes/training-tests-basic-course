<?php

namespace App;

readonly class WordAnalyzer
{

    public function __construct(
        private WordToNumberConverter $converter,
        private PrimeNumberChecker    $primeChecker,
        private HappyNumberChecker    $happyChecker
    ) {}

    public function analyze(string $word): array
    {
        $number = $this->converter->convert($word);

        return [
            'number' => $number,
            'isPrime' => $this->primeChecker->isPrime($number),
            'isHappy' => $this->happyChecker->isHappy($number),
            'isMultipleOf3Or5' => $number % 3 === 0 || $number % 5 === 0
        ];
    }
}
