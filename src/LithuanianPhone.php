<?php

declare(strict_types=1);

namespace Vampyrian\LithuanianPhone;

use Vampyrian\LithuanianPhone\Enums\NumberFormatType;
use Vampyrian\LithuanianPhone\Enums\Operator;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneException;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneLengthException;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneOperatorNotFoundException;
use Vampyrian\LithuanianPhone\Helper\LithuanianPhoneNumberUtils;
use Vampyrian\LithuanianPhone\Helper\OperatorFactory;

class LithuanianPhone
{
    /**
     * @param string $baseNumber
     * @param Operator $operator
     */
    private function __construct(private readonly string $baseNumber, private readonly Operator $operator)
    {
    }

    /**
     * @throws LithuanianPhoneException
     * @throws LithuanianPhoneLengthException
     * @throws LithuanianPhoneOperatorNotFoundException
     */
    public static function parse(string $number): self
    {
        $onlyDigits = LithuanianPhoneNumberUtils::filterOnlyDigits($number);
        $withoutCode = LithuanianPhoneNumberUtils::getPhoneWithoutCode($onlyDigits);
        LithuanianPhoneNumberUtils::checkLengthWithoutCode($withoutCode);

        $operator = OperatorFactory::getOperator($withoutCode);
        return new self($withoutCode, $operator);
    }

    public function getOperator(): Operator
    {
        return $this->operator;
    }

    public function format(NumberFormatType $format): string
    {
        return $format->value . $this->baseNumber;
    }
}
