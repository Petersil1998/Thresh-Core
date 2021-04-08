<?php

namespace Thresh_Core\Constants;

use ReflectionClass;

class ApexRankedTiers
{
    const MASTER = 'MASTER';
    const GRANDMASTER = 'GRANDMASTER';
    const CHALLENGER = 'CHALLENGER';

    /**
     * @return array
     */
    public static function getApexTiers(): array
    {
        $reflection = new ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}