<?php

namespace Thresh_Core\Collections;

use Thresh_Core\Objects\Item;

/**
 * This class represents the collection of all ingame Items
 * @see Item
 * @package Thresh\Collections
 */
class Items
{
    public static $DEFAULT_ITEM;

    /**
     * @var Item[]
     */
    private static $items;

    /**
     * This Method returns the **Item** object with the specified ID.
     * If no Item with the specified ID was found returns **false**
     * @param int $id Item ID
     * @return false|Item
     */
    public static function getItem(int $id){
        foreach (self::$items as $item){
            if($item->getId() == $id){
                return $item;
            }
        }
        return false;
    }

    /**
     * This Method returns an array containing all Items
     * @return Item[]
     */
    public static function getItems(): array
    {
        return self::$items;
    }

    /**
     * Used to set the list of Items (**Do not use it!**)
     * @param Item[] $items
     */
    public static function setItems(array $items): void
    {
        self::$items = $items;
    }
}

Items::$DEFAULT_ITEM = new Item(0, null, true);