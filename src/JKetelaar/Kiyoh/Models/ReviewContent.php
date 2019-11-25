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
     * @var string
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
     * @param string $rating
     * @param int    $order
     * @param string $translation
     */
    public function __construct(string $group, string $type, string $rating, int $order, string $translation)
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
     * @return mixed
     */
    public function getRating()
    {
        $rating = $this->rating;
        switch ($this->getType()) {
            case 'INT':
                $rating = intval($rating);
                break;
            case 'BOOLEAN':
                $rating = filter_var($rating, FILTER_VALIDATE_BOOLEAN);
                break;
            default:
                $rating = strval($rating);
                break;
        }
        return $rating;
    }

    /**
     * @param mixed $rating
     *
     * @return ReviewContent
     */
    public function setRating(string $rating): self
    {
        switch ($this->getType()) {
            case 'BOOLEAN':
                $rating = $this->validateRating($rating);
                break;
            default:
                $rating = strval($rating);
                break;
        }
        $this->rating = $rating;

        return $this;
    }

    /**
     * @param string $rating
     *
     * @return string
     */
    private function validateRating(string $rating): string
    {
        if (is_bool($rating)) {
            return ($rating ? 'true' : 'false');
        } else {
            return strval($rating);
        }
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
