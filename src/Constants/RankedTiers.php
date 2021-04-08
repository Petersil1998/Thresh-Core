<?php

namespace Thresh_Core\Constants;

use ReflectionClass;

class RankedTiers
{
    const IRON = 'IRON';
    const BRONZE = 'BRONZE';
    const SILVER = 'SILVER';
    const GOLD = 'GOLD';
    const PLATINUM = 'PLATINUM';
    const DIAMOND = 'DIAMOND';

    /**
     * @return array
     */
    public static function getTiers(): array
    {
        $reflection = new ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}