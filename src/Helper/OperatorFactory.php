<?php

declare(strict_types=1);

namespace Vampyrian\LithuanianPhone\Helper;

use Vampyrian\LithuanianPhone\Enums\Operator;
use Vampyrian\LithuanianPhone\Exceptions\LithuanianPhoneOperatorNotFoundException;

class OperatorFactory
{
    /**
     * @throws LithuanianPhoneOperatorNotFoundException
     */
    public static function getOperator(string $number): Operator
    {
        foreach (self::$operators as $code => $operator) {
            if (str_starts_with($number, (string) $code)) {
                return $operator;
            }
        }

        throw new LithuanianPhoneOperatorNotFoundException('Operator not found.');
    }

    private static array $operators = [
        //LOCAL FIXED OPERATOR
        '425' => Operator::AKMENE,
        '460' => Operator::PALANGA,
        '315' => Operator::ALYTUS,
        '45' => Operator::PANEVEZYS,
        '381' => Operator::ANYKSCIAI,
        '451' => Operator::PASVALYS,
        '319' => Operator::PRIENAI,
        '448' => Operator::PLUNGE,
        '450' => Operator::BIRZAI,
        '313' => Operator::DRUSKININKAI,
        '422' => Operator::RADVILISKIS,
        '528' => Operator::TRAKAI,
        '428' => Operator::RASEINIAI,
        '46' => Operator::KLAIPEDA,
        '458' => Operator::ROKISKIS,
        '386' => Operator::IGNALINA,
        '440' => Operator::SKUODAS,
        '349' => Operator::JONAVA,
        '345' => Operator::SAKIAI,
        '426' => Operator::JONISKIS,
        '380' => Operator::SALCININKAI,
        '447' => Operator::JURBARKAS,
        '41' => Operator::SIAULIAI,
        '346' => Operator::KAISIADORIS,
        '449' => Operator::SILALE,
        '37' => Operator::KAUNAS,
        '441' => Operator::SILUTE,
        '347' => Operator::KEDAINIAI,
        '382' => Operator::SIRVINTOS,
        '427' => Operator::KELME,
        '387' => Operator::SVENCIONYS,
        '446' => Operator::TAURAGE,
        '445' => Operator::KRETINGA,
        '444' => Operator::TELSIAI,
        '459' => Operator::KUPISKIS,
        '318' => Operator::LAZDIJAI,
        '340' => Operator::UKMERGE,
        '343' => Operator::MARIJAMPOLE,
        '389' => Operator::UTENA,
        '443' => Operator::MAZEIKIAI,
        '310' => Operator::VARENA,
        '383' => Operator::MOLETAI,
        '342' => Operator::VILKAVISKIS,
        '469' => Operator::NIDA,
        '5' => Operator::VILNIUS,
        '421' => Operator::PAKRUOJIS,
        '385' => Operator::ZARASAI,

        //BITE
        '630' => Operator::BITE,
        '631' => Operator::BITE,
        '633' => Operator::BITE,
        '634' => Operator::BITE,
        '635' => Operator::BITE,
        '636' => Operator::BITE,
        '637' => Operator::BITE,
        '638' => Operator::BITE,
        '639' => Operator::BITE,
        '640' => Operator::BITE,
        '641' => Operator::BITE,
        '642' => Operator::BITE,
        '643' => Operator::BITE,
        '644' => Operator::BITE,
        '650' => Operator::BITE,
        '651' => Operator::BITE,
        '652' => Operator::BITE,
        '653' => Operator::BITE,
        '654' => Operator::BITE,
        '655' => Operator::BITE,
        '656' => Operator::BITE,
        '658' => Operator::BITE,
        '681' => Operator::BITE,
        '685' => Operator::BITE,
        '689' => Operator::BITE,
        '699' => Operator::BITE,
        //EUROCOM
        '649' => Operator::EUROCOM,
        '659' => Operator::EUROCOM,
        //NORFA
        '632' => Operator::NORFA,
        //TELIA
        '610' => Operator::TELIA,
        '611' => Operator::TELIA,
        '612' => Operator::TELIA,
        '613' => Operator::TELIA,
        '614' => Operator::TELIA,
        '615' => Operator::TELIA,
        '616' => Operator::TELIA,
        '617' => Operator::TELIA,
        '618' => Operator::TELIA,
        '619' => Operator::TELIA,
        '620' => Operator::TELIA,
        '621' => Operator::TELIA,
        '622' => Operator::TELIA,
        '623' => Operator::TELIA,
        '624' => Operator::TELIA,
        '625' => Operator::TELIA,
        '626' => Operator::TELIA,
        '627' => Operator::TELIA,
        '628' => Operator::TELIA,
        '629' => Operator::TELIA,
        '680' => Operator::TELIA,
        '682' => Operator::TELIA,
        '686' => Operator::TELIA,
        '687' => Operator::TELIA,
        '688' => Operator::TELIA,
        '692' => Operator::TELIA,
        '693' => Operator::TELIA,
        '695' => Operator::TELIA,
        '696' => Operator::TELIA,
        '698' => Operator::TELIA,
        //TELE 2
        '600' => Operator::TELE2,
        '601' => Operator::TELE2,
        '602' => Operator::TELE2,
        '603' => Operator::TELE2,
        '604' => Operator::TELE2,
        '605' => Operator::TELE2,
        '606' => Operator::TELE2,
        '607' => Operator::TELE2,
        '608' => Operator::TELE2,
        '609' => Operator::TELE2,
        '645' => Operator::TELE2,
        '646' => Operator::TELE2,
        '647' => Operator::TELE2,
        '648' => Operator::TELE2,
        '670' => Operator::TELE2,
        '671' => Operator::TELE2,
        '672' => Operator::TELE2,
        '673' => Operator::TELE2,
        '674' => Operator::TELE2,
        '675' => Operator::TELE2,
        '676' => Operator::TELE2,
        '677' => Operator::TELE2,
        '678' => Operator::TELE2,
        '679' => Operator::TELE2,
        '683' => Operator::TELE2,
        '684' => Operator::TELE2,
    ];
}