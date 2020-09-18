<?php

namespace Thresh_Core\Utils;

use Thresh_Core\Constants\Constants;
use Thresh_Core\Objects\Champions\Champion;
use Thresh_Core\Objects\Runes\Rune;
use Thresh_Core\Objects\Runes\RuneStat;
use Thresh_Core\Objects\Runes\RuneStyle;
use Thresh_Core\Objects\Sprite;

/**
 * This class provides some utility Methods
 * @package Thresh_Core\Utils
 */
class Util
{
    /**
     * This Method returns the Champion Name as it is used in the Data Dragon
     * @param $championName string
     * @return string
     */
    public static function getChampWithoutSpecials(string $championName)
    {
        if ($championName == 'Wukong') {
            return 'MonkeyKing';
        } elseif ($championName == 'Cho\'Gath') {
            return 'Chogath';
        } elseif ($championName == 'LeBlanc') {
            return 'Leblanc';
        } elseif ($championName == 'Vel\'Koz') {
            return 'Velkoz';
        } elseif ($championName == 'Kai\'Sa') {
            return 'Kaisa';
        } elseif ($championName == 'Kha\'Zix') {
            return 'Khazix';
        } elseif ($championName == 'Nunu & Willump') {
            return 'Nunu';
        }
        $ret = str_replace('\'', '', $championName);
        $ret = str_replace(' ', '', $ret);
        $ret = str_replace('.', '', $ret);
        return $ret;
    }

    /**
     * This Method returns the URL for the Champion Icon
     * @param $champion Champion
     * @return string
     */
    public static function getChampionIconURL(Champion $champion){
        return Constants::DDRAGON_BASE_PATH . 'cdn/' . Constants::getDataDragonVersion() . '/img/champion/' . Util::getChampWithoutSpecials($champion->getName()) . '.png';
    }

    /**
     * This Method returns the URL for the Rune Icon
     * @param $rune Rune|RuneStat|RuneStyle
     * @return string
     */
    public static function getRuneIconURL($rune){
        return Constants::DDRAGON_BASE_PATH.'cdn/img/'.$rune->getIconPath();
    }

    /**
     * This Method returns the PNG image of a given sprite. Use imagepng() to convert the resource into an image
     * @param Sprite $sprite
     * @return bool|resource The resource returned by imagecrop()
     * @see imagepng()
     * @see imagecrop()
     */
    public static function getPNGFromSprite(Sprite $sprite)
    {
        $path = Constants::DDRAGON_BASE_PATH.'cdn/'. Constants::getDataDragonVersion().'/img/sprite/'.$sprite->getSprite();
        $filter = array('x' => $sprite->getX(), 'y' => $sprite->getY(), 'width' => $sprite->getWidth(), 'height' => $sprite->getHeight());
        return imagecrop(imagecreatefrompng($path), $filter);
    }

    /**
     * This Method returns the base 64 encoded PNG image of a given sprite.
     * @param Sprite $sprite
     * @return string base64 encoded image as string
     */
    public static function getBase64EncodedImageFromSprite(Sprite $sprite){
        ob_start();
        imagepng(Util::getPNGFromSprite($sprite));
        $image = ob_get_contents();
        ob_end_clean();
        return base64_encode($image);
    }
}