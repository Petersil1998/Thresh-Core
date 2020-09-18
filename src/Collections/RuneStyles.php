<?php

namespace Thresh_Core\Collections;

use Thresh_Core\Objects\Runes\RuneStyle;

/**
 * This class represents the collection of all RuneStyles
 * @see RuneStyle
 * @package Thresh\Collections
 */
class RuneStyles
{
    /**
     * @var RuneStyle[]
     */
    private static $runeStyles;

    /**
     * This Method returns the **RuneStyle** object with the specified ID.
     * If no RuneStyle with the specified ID was found returns **false**
     * @param int $id RuneStyle ID
     * @return false|RuneStyle
     */
    public static function getRuneStyle(int $id){
        foreach (self::$runeStyles as $runeStyle){
            if($runeStyle->getId() == $id){
                return $runeStyle;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all RuneStyles
     * @return RuneStyle[]
     */
    public static function getRuneStyles(): array
    {
        return self::$runeStyles;
    }

    /**
     * Used to set the list of RuneStyles (**Do not use it!**)
     * @param RuneStyle[] $runeStyles
     */
    public static function setRuneStyles(array $runeStyles): void
    {
        self::$runeStyles = $runeStyles;
    }
}