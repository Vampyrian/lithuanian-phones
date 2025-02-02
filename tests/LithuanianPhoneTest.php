<?php

declare(strict_types=1);

namespace Vampyrian\LithuanianPhone\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vampyrian\LithuanianPhone\LithuanianPhone;

class LithuanianPhoneTest extends TestCase
{
    #[DataProvider('validNumberProvider')]
    public function testValidNUmber(string $number): void
    {
        $this->assertTrue(LithuanianPhone::parse($number)->isValid());
    }

    public static function validNumberProvider(): array
    {
        return [
            'Kelmė' => ['+370 427 00000'],
            'Kelmė local' => ['(0 427) 00 000'],
            'Klaipėda' => ['(8 46) 00 00 00'],
            'Vilnius' => ['(+370) 5 000 0000'],
            'Mobile' => ['8672 00000'],
            'Mobile international' => ['+370 672 00000'],
        ];
    }
}