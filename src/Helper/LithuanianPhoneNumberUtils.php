<?php

declare(strict_types=1);

namespace Vampyrian\LithuanianPhone\Helper;

use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneException;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneLengthException;

class LithuanianPhoneNumberUtils
{
    /**
     * @throws LithuanianPhoneException
     */
    public static function getPhoneWithoutCode(string $number): string
    {
        preg_match('/^' . '(370|8|0)/', $number, $match);
        if (count($match) === 0) {
            throw new LithuanianPhoneException('Phone should start with 370, 8 or 0.');
        }
        return substr($number, strlen($match[0]));
    }

    /**
     * @throws LithuanianPhoneLengthException
     */
    public static function checkLengthWithoutCode(string $number): void
    {
        if (strlen($number) !== 8) {
            throw new LithuanianPhoneLengthException('Phone has incorrect length.');
        }
    }

    public static function filterOnlyDigits(string $number): string
    {
        return preg_replace('/[^0-9]/', '', $number);
    }
}