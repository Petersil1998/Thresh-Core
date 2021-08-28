<?php

namespace Thresh_Core\Collections;

use Thresh_Core\Objects\Champions\Champion;

/**
 * This class represents the collection of all Champions
 * @see Champion
 * @package Thresh\Collections
 */
class Champions
{
    /**
     * @var Champion[]
     */
    private static $champions;

    /**
     * This Method returns the **Champion** object with the specified ID.
     * If no Champion with the specified ID was found returns **false**
     * @param int $id Champion ID
     * @return false|Champion
     */
    public static function getChampion(int $id){
        foreach (self::$champions as $champion){
            if($champion->getId() == $id){
                return $champion;
            }
        }
        return false;
    }

    /**
     * This Method returns the **Champion** object with the specified Name.
     * If no Champion with the specified Name was found returns **false**
     * @param string $name Champion Name
     * @return false|Champion
     */
    public static function getChampionByName(string $name){
        foreach (self::$champions as $champion){
            $championName = strtolower(preg_replace('/[^A-Za-z]/','', $champion->getName()));
            $name = strtolower(preg_replace('/[^A-Za-z]/','', $name));
            if($championName == $name){
                return $champion;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all Champions
     * @return Champion[]
     */
    public static function getChampions(): array
    {
        return self::$champions;
    }

    /**
     * Used to set the list of Champions (**Do not use it!**)
     * @param Champion[] $champions
     */
    public static function setChampions(array $champions): void
    {
        self::$champions = $champions;
    }
}