<?php

declare(strict_types=1);

namespace Vampyrian\LithuanianPhone\Tests;

use Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vampyrian\LithuanianPhone\Enums\NumberFormatType;
use Vampyrian\LithuanianPhone\Enums\Operator;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneException;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneLengthException;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneOperatorNotFoundException;
use Vampyrian\LithuanianPhone\LithuanianPhone;

class LithuanianPhoneTest extends TestCase
{
    /**
     * @throws LithuanianPhoneException
     * @throws LithuanianPhoneLengthException
     * @throws LithuanianPhoneOperatorNotFoundException
     */
    #[DataProvider('validNumberProvider')]
    public function testValidNumber(string $number, Operator $operator): void
    {
        $lithuaniaPhone = LithuanianPhone::parse($number);
        $parsedOperator = $lithuaniaPhone->getOperator();

        $this->assertSame($parsedOperator, $operator);
    }

    public static function validNumberProvider(): array
    {
        return [
            'Kelmė' => ['+370 427 00000', Operator::KELME],
            'Kelmė local' => ['(0 427) 00 000', Operator::KELME],
            'Palanga' => ['(8 46) 00 00 00', Operator::PALANGA],
            'Klaipėda' => ['(8 46) 10 00 00', Operator::KLAIPEDA],
            'Vilnius' => ['(+370) 5 000 0000', Operator::VILNIUS],
            'Mobile' => ['8672 00000', Operator::TELE2],
            'Mobile with local' => ['0672 00000', Operator::TELE2],
            'Mobile international' => ['+370 672 00000', Operator::TELE2],
        ];
    }

    /**
     * @throws LithuanianPhoneException
     * @throws LithuanianPhoneLengthException
     * @throws LithuanianPhoneOperatorNotFoundException
     */
    #[DataProvider('invalidNumberProvider')]
    public function testInvalidNumber(string $number, string $expectedException): void
    {
        $this->expectException($expectedException);

        LithuanianPhone::parse($number);
    }

    public static function invalidNumberProvider(): array
    {
        return [
            'Lithuania phone exception' => ['+371 427 00000', LithuanianPhoneException::class],
            'Lithuania phone number length exception' => ['(0 427)  ', LithuanianPhoneLengthException::class],
            'Lithuania phone operator not found exception' => ['+370 660 000 00', LithuanianPhoneOperatorNotFoundException::class],
        ];
    }

    /**
     * @throws LithuanianPhoneException
     * @throws LithuanianPhoneLengthException
     * @throws LithuanianPhoneOperatorNotFoundException
     */
    #[DataProvider('formaterProvider')]
    public function testFormater(string $number, string $internationalFormat, string $localFormat): void
    {
        $lithuaniaPhone = LithuanianPhone::parse($number);
        $this->assertEquals($internationalFormat, $lithuaniaPhone->format(NumberFormatType::INTERNATIONAL));
        $this->assertEquals($localFormat, $lithuaniaPhone->format(NumberFormatType::LOCAL));
    }

    public static function formaterProvider(): array
    {
        return [
            'Kelmė local' => ['(0 427) 00 000', '+37042700000', '042700000'],
        ];
    }
}
