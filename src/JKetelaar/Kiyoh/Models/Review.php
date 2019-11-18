<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Models;


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
     * @var \DateTime
     */
    private $dateSince;

    /**
     * @var \DateTime
     */
    private $updatedSince;

    /**
     * Review constructor.
     * @param string $id
     * @param string $author
     * @param string $city
     * @param float $rating
     * @param string $comments
     * @param string $dateSince
     * @param string $updatedSince
     */
    public function __construct(string $id, string $author, string $city, float $rating, string $comment, string $dateSince, string $updatedSince)
    {
        $this->id = $id;
        $this->author = $author;
        $this->city = $city;
        $this->rating = $rating;
        $this->comment = $comment;
        try {
            $this->dateSince = new \DateTime($dateSince);
            $this->updatedSince = new \DateTime($updatedSince);
        } catch (\Exception $e) {
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
     */
    public function setId(string $id): void
    {
        $this->id = $id;
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
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
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
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
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
     * Retreives the comment from the company to the review
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Sets the comment from the company to the review
     * @param string $comments
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
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
     */
    public function setContent(array $content): void
    {
        $this->content = $content;
    }

    /**
     * @return ReviewContent
     */
    public function getContentItem( string $groupName ): ?\JKetelaar\Kiyoh\Models\ReviewContent
    {
        $foundContentItem = null;
        foreach ( $this->content as $contentItem ) {
            if ( $contentItem->getGroup() === $groupName ) {
                $foundContentItem = $contentItem;
                break;
            }
        }
        return $foundContentItem;
    }

    /**
     * @param string $groupName
     * @param ReviewContent $reviewContent
     */
    public function setContentItem( string $groupName, \JKetelaar\Kiyoh\Models\ReviewContent $reviewContent ): void
    {
        foreach ( $this->content as $contentItemIndex => $contentItem ) {
            if ( $contentItem->getGroup() === $groupName ) {
                $this->content[$contentItemIndex] = $reviewContent;
                break;
            }
        }
    }

    /**
     * @return \DateTime
     */
    public function getDateSince(): \DateTime
    {
        return $this->dateSince;
    }

    /**
     * @param \DateTime $dateSince
     */
    public function setDateSince(\DateTime $dateSince): void
    {
        $this->dateSince = $dateSince;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedSince(): \DateTime
    {
        return $this->updatedSince;
    }

    /**
     * @param \DateTime $updatedSince
     */
    public function setUpdatedSince(\DateTime $updatedSince): void
    {
        $this->updatedSince = $updatedSince;
    }
}
