<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Models;

class ReviewContent
{
    /**
     * @var string
     */
    private $group;

    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $rating;

    /**
     * @var int
     */
    private $order;

    /**
     * @var string
     */
    private $translation;

    /**
     * ReviewContent constructor.
     * @param string $group
     * @param string $type
     * @param float $rating
     * @param int $order
     * @param string $translation
     */
    public function __construct(string $group, string $type, float $rating, int $order, string $translation)
    {
        $this->group = $group;
        $this->type = $type;
        $this->rating = $rating;
        $this->order = $order;
        $this->translation = $translation;
    }

    /**
     * @return string
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @param string $group
     */
    public function setGroup(string $group): void
    {
        $this->group = $group;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     */
    public function setRating(float $rating): void
    {
        $this->rating = $rating;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getTranslation(): string
    {
        return $this->translation;
    }

    /**
     * @param string $translation
     */
    public function setTranslation(string $translation): void
    {
        $this->translation = $translation;
    }
}
