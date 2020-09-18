<?php

namespace Thresh_Core\Objects\Champions;

/**
 * This Class represents a Skin with its associated Data
 * @package Thresh\Entities\Champions
 */
class Skin
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $chromas;

    /**
     * Skin constructor.
     * @param int $id
     * @param string $name
     * @param bool $hasChromas
     */
    public function __construct(int $id, string $name, bool $hasChromas)
    {
        $this->id = $id;
        $this->name = $name;
        $this->chromas = $hasChromas;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function hasChromas(): bool
    {
        return $this->chromas;
    }
}