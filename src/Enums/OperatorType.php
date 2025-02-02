<?php

namespace Vampyrian\LithuanianPhone\Enums;

/**
 * Operator type. Fixed phone number
 */
enum OperatorType: string
{
    /**
     * Fixed phone number
     */
    case FIXED = 'Fiksuotas telefono ryšys';

    /**
     * Mobile phone number
     */
    case MOBILE = 'Mobulus telefono ryšys';
}