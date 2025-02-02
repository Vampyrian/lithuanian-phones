<?php

declare(strict_types=1);

namespace Vampyrian\LithuanianPhone\Enums;

/**
 *  Number format
 */
enum NumberFormatType: string
{
    /**
     * Example: `+37067217266`
     */
    case INTERNATIONAL = '+370';

    /**
     * Example: `067217266`.
     */
    case LOCAL = '0';
}