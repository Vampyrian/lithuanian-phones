<?php

namespace Vampyrian\LithuanianPhone;

class LithuanianPhone
{
    /**
     * @param string $number
     */
    public function __construct(private readonly string $number)
    {
    }


    public static function parse(string $number): self
    {
        return new self($number);
    }

    public function isValid(): bool
    {
        $filtered = $this->filterOnlyDigits($this->number);
        try {
            $withoutCode = $this->getPhoneWithoutCode($filtered);
            $this->checkLengthWithoutCode($withoutCode);
        } catch (LithuanianPhoneException|LithuanianPhoneLengthException $exception) {
            return false;
        }

        return true;
    }

    /**
     * @throws LithuanianPhoneException
     */
    private function getPhoneWithoutCode(string $number): string
    {
        preg_match('/^' . '(370|8|0)/', $this->number, $match);
        if (count($match) === 0) {
            throw new LithuanianPhoneException('Phone ' . $this->number .' should start with 370, 8 or 0.');
        }
        return substr($this->number, strlen($match[0]));
    }

    /**
     * @throws LithuanianPhoneLengthException
     */
    private function checkLengthWithoutCode(string $number): void
    {
        if (strlen($number) !== 8) {
            throw new LithuanianPhoneLengthException('Phone ' . $this->number .' has incorrect length.');
        }
    }

    private function filterOnlyDigits(string $number): string
    {
        return preg_replace('/[^0-9]/', '', $number);
    }

    /**
     * @return string[]
     */
    private function getMobileOperatorCode(): array
    {

    }

    /**
     * @return string[]
     */
    private function bite(): array
    {
        return [
            '630',
            '631',
            '633',
            '634',
            '635',
            '636',
            '637',
            '638',
            '639',
            '640',
            '641',
            '642',
            '643',
            '644',
            '650',
            '651',
            '652',
            '653',
            '654',
            '655',
            '656',
            '658',
            '681',
            '685',
            '689',
            '699'
        ];
    }

    /**
     * @return string[]
     */
    private function eurocom(): array
    {
        return [
            '649',
            '659',
        ];
    }

    /**
     * @return string[]
     */
    private function norfa(): array
    {
        return [
            '632',
        ];
    }

    /**
     * @return string[]
     */
    private function telia(): array
    {
        return [
            '610',
            '611',
            '612',
            '613',
            '614',
            '615',
            '616',
            '617',
            '618',
            '619',
            '620',
            '621',
            '622',
            '623',
            '624',
            '625',
            '626',
            '627',
            '628',
            '629',
            '680',
            '682',
            '686',
            '687',
            '688',
            '692',
            '693',
            '695',
            '696',
            '698'
        ];
    }

    /**
     * @return string[]
     */
    private function tele2(): array
    {
        return [
            '600',
            '601',
            '602',
            '603',
            '604',
            '605',
            '606',
            '607',
            '608',
            '609',
            '645',
            '646',
            '647',
            '648',
            '670',
            '671',
            '672',
            '673',
            '674',
            '675',
            '676',
            '677',
            '678',
            '679',
            '683',
            '684',
        ];
    }
}

//kelmė +370 427 52239
//kelmė (0 427) 69 052
//Klaipėda:  (8 46) 39 60 66
//Vilniaus (+370) 5 211 2000
//tele2 8672 17260

//'regex:/^(?:\+370|0|8)\d{8}$/'
