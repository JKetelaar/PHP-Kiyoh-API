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
     *
     * @param string $group
     * @param string $type
     * @param float  $rating
     * @param int    $order
     * @param string $translation
     */
    public function __construct(string $group, string $type, float $rating, int $order, string $translation)
    {
        $this->group        = $group;
        $this->type         = $type;
        $this->rating       = $rating;
        $this->order        = $order;
        $this->translation  = $translation;
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
     *
     * @return ReviewContent
     */
    public function setGroup(string $group): self
    {
        $this->group = $group;

        return $this;
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
     *
     * @return ReviewContent
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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
     *
     * @return ReviewContent
     */
    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
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
     *
     * @return ReviewContent
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;

        return $this;
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
     *
     * @return ReviewContent
     */
    public function setTranslation(string $translation): self
    {
        $this->translation = $translation;

        return $this;
    }
}
