<?php

declare(strict_types=1);

namespace Vampyrian\LithuanianPhone\Tests;

use Exception;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Vampyrian\LithuanianPhone\Enums\NumberFormatType;
use Vampyrian\LithuanianPhone\Enums\Operator;
use Vampyrian\LithuanianPhone\Enums\OperatorType;
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
    public function testValidNumber(string $number, Operator $operator, OperatorType $operatorType): void
    {
        $lithuaniaPhone = LithuanianPhone::parse($number);
        $parsedOperator = $lithuaniaPhone->getOperator();
        $parsedOperatorType = $parsedOperator->getType();

        $this->assertSame($operator, $parsedOperator);
        $this->assertSame($operatorType, $parsedOperatorType);
    }

    public static function validNumberProvider(): array
    {
        return [
            'Kelmė' => ['+370 427 00000', Operator::KELME, OperatorType::FIXED],
            'Kelmė local' => ['(0 427) 00 000', Operator::KELME, OperatorType::FIXED],
            'Palanga' => [' (0 460) 48 995', Operator::PALANGA, OperatorType::FIXED],
            'Klaipėda' => [' (8 46) 41 99 40', Operator::KLAIPEDA, OperatorType::FIXED],
            'Vilnius' => ['(+370) 5 000 0000', Operator::VILNIUS, OperatorType::FIXED],
            'Mobile' => ['8672 00000', Operator::TELE2, OperatorType::MOBILE],
            'Mobile with local' => ['0672 00000', Operator::TELE2, OperatorType::MOBILE],
            'Mobile international' => ['+370 672 00000', Operator::TELE2, OperatorType::MOBILE],
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
