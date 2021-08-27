<?php

namespace Thresh_Core\Constants;

/**
 * This class contains API_BASE_PATHS Constants (some have placeholders) and the Data Dragon Version
 * @package Thresh\Constants
 */
class Constants
{
    private static $ddragonVersion;

    const API_BASE_PATH = 'https://{}.api.riotgames.com/';
    const DDRAGON_BASE_PATH = 'https://ddragon.leagueoflegends.com/';
    const STATIC_DATA_BASE_PATH = 'http://static.developer.riotgames.com/docs/lol/';
    const SPECTATOR_URL = 'spectator.{platform}.lol.riotgames.com:80';

    /**
     * This Method returns the current Data Dragon (DDragon) Version
     * @return string
     */
    public static function getDataDragonVersion(): string
    {
        return self::$ddragonVersion;
    }

    /**
     * Used to set the Data Dragon Version (**Do not use it!**)
     * @param string $dataDragonVersion
     */
    public static function setDataDragonVersion(string $dataDragonVersion){
        self::$ddragonVersion = $dataDragonVersion;
    }
}
