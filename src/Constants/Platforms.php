<?php

namespace Thresh_Core\Constants;

use ReflectionClass;

/**
 * This class contains all possible Platforms (used for API request)
 * @package Thresh\Constants
 */
class Platforms
{
    const EUW = 'euw1';
    const EUNE = 'eun1';
    const KR = 'kr';
    const JP = 'jp1';
    const OCE = 'oc1';
    const BR = 'br1';
    const RU = 'ru';
    const TR = 'tr1';
    const NA = 'na1';
    const LAN = 'la1';
    const LAS = 'la2';

    /**
     * @return array
     */
    public static function getPlatforms(): array
    {
        $reflection = new ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}