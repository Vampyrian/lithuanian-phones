<?php

declare(strict_types=1);

namespace Vampyrian\LithuanianPhone\Enums;

enum Operator: string
{
    case BITE = 'Bitė';
    case EUROCOM = 'Eurocom';
    case NORFA = 'Norfa';
    case TELIA = 'Telia';
    case TELE2 = 'Tele 2';

    case AKMENE = 'Akmenė';
    case PALANGA = 'Palanga';
    case ALYTUS = 'Alytus';
    case PANEVEZYS = 'Panevėžys';
    case ANYKSCIAI = 'Anykščiai';
    case PASVALYS = 'Pasvalys';
    case PRIENAI = 'Prienai';
    case PLUNGE = 'Plungė';
    case BIRZAI = 'Biržai';
    case DRUSKININKAI = 'Druskininkai';
    case RADVILISKIS = 'Radviliškis';
    case TRAKAI = 'Trakai';
    case RASEINIAI = 'Raseinia';
    case KLAIPEDA = 'Klaipėda';
    case ROKISKIS = 'Rokiškis';
    case IGNALINA = 'Ignalina';
    case SKUODAS = 'Skuodas';
    case JONAVA = 'Jonava';
    case SAKIAI = 'Šakiai';
    case JONISKIS = 'Joniškis';
    case SALCININKAI = 'Šalčininkai';
    case JURBARKAS = 'Jurbarka';
    case SIAULIAI = 'Šiauliai';
    case KAISIADORIS = 'Kaišiandoris';
    case SILALE = 'Šilalė';
    case KAUNAS = 'Kaunas';
    case SILUTE = 'Šilutė';
    case KEDAINIAI = 'Kėdainiai';
    case SIRVINTOS = 'Širvintos';
    case KELME = 'Kelmė';
    case SVENCIONYS = 'Švenčionys';
    case TAURAGE = 'Tauragė';
    case KRETINGA = 'Kretinga';
    case TELSIAI = 'Telšiai';
    case KUPISKIS = 'Kupiškis';
    case LAZDIJAI = 'Lazdijai';
    case UKMERGE = 'Ukmergė';
    case MARIJAMPOLE = 'Marijampolė';
    case UTENA = 'Utena';
    case MAZEIKIAI = 'Mažeikiai';
    case VARENA = 'Varėna';
    case MOLETAI = 'Molėtai';
    case VILKAVISKIS = 'Vilkaviškis';
    case NIDA = 'Nida';
    case VILNIUS = 'Vilnius';
    case PAKRUOJIS = 'Pakruojis';
    case ZARASAI = 'Zarasai';

    public function getType(): OperatorType
    {
        if (in_array($this, [self::BITE, self::EUROCOM, self::NORFA, self::TELIA, self::TELE2])) {
            return OperatorType::MOBILE;
        }
        return OperatorType::FIXED;
    }
}