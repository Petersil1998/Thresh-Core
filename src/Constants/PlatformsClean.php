<?php

namespace Thresh_Core\Constants;

use ReflectionClass;

class PlatformsClean
{
    const EUW = 'euw';
    const EUNE = 'eune';
    const KR = 'kr';
    const JP = 'jp';
    const OCE = 'oce';
    const BR = 'br';
    const RU = 'ru';
    const TR = 'tr';
    const NA = 'na';
    const LAN = 'lan';
    const LAS = 'las';

    /**
     * @return array
     */
    public static function getPlatforms(): array
    {
        $reflection = new ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}