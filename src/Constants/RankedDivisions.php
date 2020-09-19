<?php

namespace Thresh_Core\Constants;

use ReflectionClass;

class RankedDivisions
{
    const I = 'I';
    const II = 'II';
    const III = 'III';
    const IV = 'IV';

    /**
     * @return array
     */
    public static function getDivisions(){
        $reflection = new ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}