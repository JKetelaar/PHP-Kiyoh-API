<?php

declare(strict_types=1);

/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Model;

use DateTime;
use Exception;

class Review
{
    /**
     * @var ReviewContent[]
     */
    private array $content;

    private DateTime $dateSince;
    private DateTime $updatedSince;

    /**
     * Review constructor.
     */
    public function __construct(
        private string $id,
        private string $author,
        private string $city,
        private float $rating,
        private string $comment,
        string $dateSince,
        string $updatedSince,
        private string $referenceCode
    ) {
        try {
            $this->dateSince = new DateTime($dateSince);
            $this->updatedSince = new DateTime($updatedSince);
        } catch (Exception $e) {
            // Unhandled exception.
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Retrieves the comment from the company to the review.
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Sets the comment from the company to the review.
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return array<int, ReviewContent>
     */
    public function getContent(): array
    {
        return $this->content;
    }

    /**
     * @param ReviewContent[] $content
     */
    public function setContent(array $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getContentItem(string $groupName): ?ReviewContent
    {
        foreach ($this->content as $contentItem) {
            if ($contentItem->getGroup() === $groupName) {
                return $contentItem;
            }
        }

        return null;
    }

    public function setContentItem(string $groupName, ReviewContent $reviewContent): self
    {
        foreach ($this->content as $contentItemIndex => $contentItem) {
            if ($contentItem->getGroup() === $groupName) {
                $this->content[$contentItemIndex] = $reviewContent;
                return $this;
            }
        }

        return $this;
    }

    public function getDateSince(): DateTime
    {
        return $this->dateSince;
    }

    public function setDateSince(DateTime $dateSince): self
    {
        $this->dateSince = $dateSince;

        return $this;
    }

    public function getUpdatedSince(): DateTime
    {
        return $this->updatedSince;
    }

    public function setUpdatedSince(DateTime $updatedSince): self
    {
        $this->updatedSince = $updatedSince;

        return $this;
    }

    /**
     * Retrieves the referenceCode from the  review.
     */
    public function getReferenceCode(): string
    {
        return $this->referenceCode;
    }

    public function setReferenceCode(string $referenceCode): self
    {
        $this->referenceCode = $referenceCode;

        return $this;
    }
}
