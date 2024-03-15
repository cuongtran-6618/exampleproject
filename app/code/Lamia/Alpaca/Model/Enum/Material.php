<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE
 *
 * This source file is released under commercial license by Lamia Oy.
 *
 * @copyright Copyright (c) Lamia Oy (https://lamia.fi)
 */


namespace Lamia\Alpaca\Model\Enum;

enum Material: string
{
    case COTTON = 'cotton';
    case LEATHER = 'leather';
    case SILK = 'silk';
    case FUR = 'fur';
    case WOOL = 'wool';
}
