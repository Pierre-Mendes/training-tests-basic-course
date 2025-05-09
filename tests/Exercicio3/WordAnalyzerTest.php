<?php

namespace Exercicio3;

use App\HappyNumberChecker;
use App\PrimeNumberChecker;
use App\WordAnalyzer;
use App\WordToNumberConverter;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class WordAnalyzerTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAnalyze(): void
    {
        $converterMock = $this->createMock(WordToNumberConverter::class);
        $primeCheckerMock = $this->createMock(PrimeNumberChecker::class);
        $happyCheckerMock = $this->createMock(HappyNumberChecker::class);

        $converterMock->method('convert')
            ->willReturnMap([
                ['a', 1],
                ['b', 2],
                ['abc', 6]
            ]);

        $primeCheckerMock->method('isPrime')
            ->willReturnMap([
                [1, false],
                [2, true],
                [6, false]
            ]);

        $happyCheckerMock->method('isHappy')
            ->willReturnMap([
                [1, true],
                [2, false],
                [6, false]
            ]);

        $analyzer = new WordAnalyzer($converterMock, $primeCheckerMock, $happyCheckerMock);

        $result = $analyzer->analyze('a');
        $this->assertEquals(1, $result['number']);
        $this->assertFalse($result['isPrime']);
        $this->assertTrue($result['isHappy']);
        $this->assertFalse($result['isMultipleOf3Or5']);

        $result = $analyzer->analyze('b');
        $this->assertEquals(2, $result['number']);
        $this->assertTrue($result['isPrime']);
        $this->assertFalse($result['isHappy']);

        $result = $analyzer->analyze('abc');
        $this->assertEquals(6, $result['number']);
        $this->assertFalse($result['isPrime']);
        $this->assertFalse($result['isHappy']);
        $this->assertTrue($result['isMultipleOf3Or5']);
    }

    public function testAnalyzeWithDependencies(): void
    {
        $analyzer = new WordAnalyzer(
            new WordToNumberConverter(),
            new PrimeNumberChecker(),
            new HappyNumberChecker()
        );

        $result = $analyzer->analyze('a');
        $this->assertEquals(1, $result['number']);
        $this->assertFalse($result['isPrime']);
        $this->assertTrue($result['isHappy']);
        $this->assertFalse($result['isMultipleOf3Or5']);

        $result = $analyzer->analyze('b');
        $this->assertEquals(2, $result['number']);
        $this->assertTrue($result['isPrime']);
        $this->assertFalse($result['isHappy']);

        $result = $analyzer->analyze('abc');
        $this->assertEquals(6, $result['number']);
        $this->assertFalse($result['isPrime']);
        $this->assertFalse($result['isHappy']);
        $this->assertTrue($result['isMultipleOf3Or5']);

        $result = $analyzer->analyze('a1!b@2');
        $this->assertEquals(3, $result['number']);
    }

    public function testAnalyzeWithHappyAndPrime(): void
    {
        $analyzer = new WordAnalyzer(
            new WordToNumberConverter(),
            new PrimeNumberChecker(),
            new HappyNumberChecker()
        );

        $result = $analyzer->analyze('g');
        $this->assertEquals(7, $result['number']);
        $this->assertTrue($result['isPrime']);
        $this->assertTrue($result['isHappy']);
        $this->assertFalse($result['isMultipleOf3Or5']);
    }

    public function testAnalyzeWithNoneTrue(): void
    {
        $analyzer = new WordAnalyzer(
            new WordToNumberConverter(),
            new PrimeNumberChecker(),
            new HappyNumberChecker()
        );

        $result = $analyzer->analyze('ac');
        $this->assertEquals(4, $result['number']);
        $this->assertFalse($result['isPrime']);
        $this->assertFalse($result['isHappy']);
        $this->assertFalse($result['isMultipleOf3Or5']);
    }

    public function testAnalyzeEmptyString(): void
    {
        $analyzer = new WordAnalyzer(
            new WordToNumberConverter(),
            new PrimeNumberChecker(),
            new HappyNumberChecker()
        );

        $result = $analyzer->analyze('');
        $this->assertEquals(0, $result['number']);
        $this->assertFalse($result['isPrime']);
        $this->assertFalse($result['isHappy']);
        $this->assertTrue($result['isMultipleOf3Or5']);
    }

    public function testAnalyzeOnlyInvalidCharacters(): void
    {
        $analyzer = new WordAnalyzer(
            new WordToNumberConverter(),
            new PrimeNumberChecker(),
            new HappyNumberChecker()
        );

        $result = $analyzer->analyze('123!@#$%^&*()');
        $this->assertEquals(0, $result['number']);
        $this->assertFalse($result['isPrime']);
        $this->assertFalse($result['isHappy']);
        $this->assertTrue($result['isMultipleOf3Or5']);
    }

    public function testAnalyzeWithAccentedCharacters(): void
    {
        $analyzer = new WordAnalyzer(
            new WordToNumberConverter(),
            new PrimeNumberChecker(),
            new HappyNumberChecker()
        );

        $result = $analyzer->analyze('áéíóú');
        $this->assertEquals(0, $result['number']);
        $this->assertFalse($result['isPrime']);
        $this->assertFalse($result['isHappy']);
    }
}
