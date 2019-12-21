<?php

namespace JKetelaar\KiyOh\Model;

use DateTime;
use Exception;

/**
 * @author JKetelaar
 *
 * Class Review.
 *
 * @package JKetelaar\KiyOh\Model
 */
class Review
{
    /**
     * The unique review ID assigned by KiyOh.
     *
     * @var string $id
     */
    private string $id;

    /**
     * The author of this review.
     *
     * @var string $author
     */
    private string $author;

    /**
     * The city where the author of this review is located.
     *
     * @var string $city
     */
    private string $city;

    /**
     * The rating of this review.
     *
     * @var float $rating
     */
    private float $rating;

    /**
     * The comment of this review.
     *
     * @var string $comment
     */
    private string $comment;

    /**
     * An array of instances of the Content class.
     * These content classes belong to this current review.
     *
     * @var ReviewContent[] $content
     */
    private array $content;

    /**
     * A datetime instance of the date when this review got written.
     *
     * @var DateTime $dateSince
     */
    private DateTime $dateSince;

    /**
     * A datetime instance of the last date this review got updated.
     *
     * @var DateTime $updatedSince
     */
    private DateTime $updatedSince;

    /**
     * Review constructor.
     *
     * @param string $id
     * @param string $author
     * @param string $city
     * @param float  $rating
     * @param string $comment
     * @param string $dateSince
     * @param string $updatedSince
     */
    public function __construct(
        string $id,
        string $author,
        string $city,
        float $rating,
        string $comment,
        string $dateSince,
        string $updatedSince
    ) {
        $this->id = $id;
        $this->author = $author;
        $this->city = $city;
        $this->rating = $rating;
        $this->comment = $comment;

        try {
            $this->dateSince = new DateTime($dateSince);
            $this->updatedSince = new DateTime($updatedSince);
        } catch (Exception $e) {
            // Unhandled exception.
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return Review
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return Review
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     *
     * @return Review
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

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
     * @return Review
     */
    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return string (multiline)
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment (multiline)
     *
     * @return Review
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return ReviewContent[]
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param ReviewContent[] $content
     *
     * @return Review
     */
    public function setContent(array $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param string $groupName
     *
     * @return ReviewContent|null
     */
    public function getContentItem(string $groupName): ?ReviewContent
    {
        $foundContentItem = null;

        foreach ($this->content as $contentItem) {
            if ($contentItem->getGroup() === $groupName) {
                $foundContentItem = $contentItem;
                break;
            }
        }

        return $foundContentItem;
    }

    /**
     * Setter each content item for the review.
     *
     * There are different content groups
     * - DEFAULT_OVERALL   (The review rating)
     * - DEFAULT_ONELINER  (A small description)
     * - DEFAULT_OPINION   (A detailed description of the users experience)
     * - DEFAULT_RECOMMEND (Whether the user recommends the current product / service)
     *
     * @param string        $groupName
     * @param ReviewContent $reviewContent
     *
     * @return Review
     */
    public function setContentItem(string $groupName, ReviewContent $reviewContent): self
    {
        foreach ($this->content as $contentItemIndex => $contentItem) {
            if ($contentItem->getGroup() === $groupName) {
                $this->content[$contentItemIndex] = $reviewContent;
                break;
            }
        }

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateSince(): DateTime
    {
        return $this->dateSince;
    }

    /**
     * @param DateTime $dateSince
     *
     * @return Review
     */
    public function setDateSince(DateTime $dateSince): self
    {
        $this->dateSince = $dateSince;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedSince(): DateTime
    {
        return $this->updatedSince;
    }

    /**
     * @param DateTime $updatedSince
     *
     * @return Review
     */
    public function setUpdatedSince(DateTime $updatedSince): self
    {
        $this->updatedSince = $updatedSince;

        return $this;
    }
}
