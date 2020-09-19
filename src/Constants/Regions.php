<?php

namespace Thresh_Core\Constants;

use ReflectionClass;

/**
 * This class contains all possible Regions (used for API request)
 * @package Thresh\Constants
 */
class Regions
{
    const AMERICA = 'americas';
    const ASIA = 'asia';
    const EUROPE = 'europe';

    /**
     * @return array
     */
    public static function getRegions(){
        $reflection = new ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}