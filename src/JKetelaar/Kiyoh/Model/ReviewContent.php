<?php

namespace JKetelaar\KiyOh\Model;

/**
 * @author JKetelaar
 *
 * Class ReviewContent.
 *
 * @package JKetelaar\KiyOh\Model
 */
class ReviewContent
{
    /**
     * The group of the current review content.
     *
     * There are different content groups
     * - DEFAULT_OVERALL   (The review rating)
     * - DEFAULT_ONELINER  (A small description)
     * - DEFAULT_OPINION   (A detailed description of the users experience)
     * - DEFAULT_RECOMMEND (Whether the user recommends the current product / service)
     *
     * @var string $group
     */
    private string $group;

    /**
     * The scalar type the current content has.
     *
     * @var string $type
     */
    private string $type;

    /**
     * The rating of the current of the review, this will be casted to a string.
     *
     * @var string $rating
     */
    private string $rating;

    /**
     * The order of the content.
     *
     * @var int $order
     */
    private int $order;

    /**
     * The translation for the content.
     *
     * @var string $translation
     */
    private string $translation;

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
    public function getRating(): string
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
     * @param string $rating
     *
     * @return string
     */
    private function validateRating(string $rating): string
    {
        if (is_bool($rating)) {
            return $rating ? 'true' : 'false';
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
