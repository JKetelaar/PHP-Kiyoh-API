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
     * @param string $dateSince
     * @param string $updatedSince
     */
    public function __construct(string $id, string $author, string $city, float $rating, string $dateSince, string $updatedSince)
    {
        $this->id = $id;
        $this->author = $author;
        $this->city = $city;
        $this->rating = $rating;
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
