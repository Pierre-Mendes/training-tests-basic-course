<?php

namespace Exercise3;

use App\WordToNumberConverter;
use PHPUnit\Framework\TestCase;

class WordToNumberConverterTest extends TestCase
{
    public function testConvert(): void
    {
        $converter = new WordToNumberConverter();

        $this->assertEquals(1, $converter->convert('a'));
        $this->assertEquals(27, $converter->convert('A'));
        $this->assertEquals(3, $converter->convert('ab'));
        $this->assertEquals(55, $converter->convert('AB'));
        $this->assertEquals(6, $converter->convert('a1b2!c'));
    }
}
