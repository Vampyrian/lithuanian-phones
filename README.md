# Vampyrian/lithuanian-phones

A phone number library for PHP.

## Installation

This library is installable via [Composer](https://getcomposer.org/):

```bash
composer require vampyrian/lithuanian-phones
```

## Requirements

This library requires PHP 8.1 or later.

## Quick start

All the classes lie in the `vampyrian/lithuanian-phones` namespace.

To obtain an instance of `LithuanianPhone`, use the `parse()` method.

### Validating a number

The `parse()` method is quite permissive with numbers; it basically attempts to match a country code,
and validates the length of the phone number for this country and operator.

If a number is really malformed, it throws a `LithuanianPhoneException`, `LithuanianPhoneLengthException` or `LithuanianPhoneOperatorNotFoundException`:

```php
use Vampyrian\LithuanianPhone;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneException;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneLengthException;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneOperatorNotFoundException;

try {
    $number = LithuanianPhone::parse('+370 672 17266');
}
catch (LithuanianPhoneException $e) {
    // 'Code is not correct for lithuania phone number.'
}
catch (LithuanianPhoneLengthException $e) {
    // 'Length is incorrect for lithuania phone number.'
}
catch (LithuanianPhoneOperatorNotFoundException $e) {
    // 'Operator is incorrect.'
}
```

### Formatting a number

You can use `format()` with a `NumberFormatType` enum value:

```php
$number = LithuanianPhone::parse('+370 672 17266');
$number->format(NumberFormatType::INTERNATIONAL); // +37067217266
$number->format(NumberFormatType::LOCAL); // 067217266
```

### Number types

In certain cases, it is possible to know the type of a phone number (fixed line, mobile phone), and operator:

```php
$lithuaniaPhone = LithuanianPhone::parse('(0 427) 00 000');
$parsedOperator = $lithuaniaPhone->getOperator(); // Operator::KELME
$parsedOperatorType = $parsedOperator->getType(); // OperatorType::FIXED

$lithuaniaPhone = LithuanianPhone::parse('0672 17266');
$parsedOperator = $lithuaniaPhone->getOperator(); // Operator::TELE2
$parsedOperatorType = $parsedOperator->getType(); // OperatorType::MOBILE
```
