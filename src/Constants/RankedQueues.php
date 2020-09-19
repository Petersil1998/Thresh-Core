<?php

namespace Thresh_Core\Constants;

use ReflectionClass;

class RankedQueues
{
    const SOLO_DUO = 'RANKED_SOLO_5x5';
    const FLEX = 'RANKED_FLEX_SR';

    /**
     * @return array
     */
    public static function getPlatforms(){
        $reflection = new ReflectionClass(__CLASS__);
        return $reflection->getConstants();
    }
}