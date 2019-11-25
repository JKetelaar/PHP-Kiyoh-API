<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Model;

use DateTime;
use Exception;

class Review
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $city;

    /**
     * @var float
     */
    private $rating;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var ReviewContent[]
     */
    private $content;

    /**
     * @var DateTime
     */
    private $dateSince;

    /**
     * @var DateTime
     */
    private $updatedSince;

    /**
     * Review constructor.
     *
     * @param string $id
     * @param string $author
     * @param string $city
     * @param float $rating
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
     * Retrieves the comment from the company to the review.
     *
     * @return string (multiline)
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Sets the comment from the company to the review.
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
     * @param string $groupName
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
