<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Models;


class Company
{
    /**
     * @var float
     */
    private $averageRating;

    /**
     * @var int
     */
    private $numberReviews;

    /**
     * @var float
     */
    private $last12MonthAverageRating;

    /**
     * @var int
     */
    private $last12MonthNumberReviews;

    /**
     * @var int
     */
    private $percentageRecommendation;

    /**
     * @var int
     */
    private $locationId;

    /**
     * @var string
     */
    private $locationName;

    /**
     * @var Review[]
     */
    private $reviews;

    /**
     * Company constructor.
     * @param float $averageRating
     * @param int $numberReviews
     * @param float $last12MonthAverageRating
     * @param int $last12MonthNumberReviews
     * @param int $percentageRecommendation
     * @param int $locationId
     * @param string $locationName
     */
    public function __construct(float $averageRating, int $numberReviews, float $last12MonthAverageRating, int $last12MonthNumberReviews, int $percentageRecommendation, int $locationId, string $locationName)
    {
        $this->averageRating = $averageRating;
        $this->numberReviews = $numberReviews;
        $this->last12MonthAverageRating = $last12MonthAverageRating;
        $this->last12MonthNumberReviews = $last12MonthNumberReviews;
        $this->percentageRecommendation = $percentageRecommendation;
        $this->locationId = $locationId;
        $this->locationName = $locationName;
    }

    /**
     * @return float
     */
    public function getAverageRating(): float
    {
        return $this->averageRating;
    }

    /**
     * @param float $averageRating
     */
    public function setAverageRating(float $averageRating): void
    {
        $this->averageRating = $averageRating;
    }

    /**
     * @return int
     */
    public function getNumberReviews(): int
    {
        return $this->numberReviews;
    }

    /**
     * @param int $numberReviews
     */
    public function setNumberReviews(int $numberReviews): void
    {
        $this->numberReviews = $numberReviews;
    }

    /**
     * @return float
     */
    public function getLast12MonthAverageRating(): float
    {
        return $this->last12MonthAverageRating;
    }

    /**
     * @param float $last12MonthAverageRating
     */
    public function setLast12MonthAverageRating(float $last12MonthAverageRating): void
    {
        $this->last12MonthAverageRating = $last12MonthAverageRating;
    }

    /**
     * @return int
     */
    public function getLast12MonthNumberReviews(): int
    {
        return $this->last12MonthNumberReviews;
    }

    /**
     * @param int $last12MonthNumberReviews
     */
    public function setLast12MonthNumberReviews(int $last12MonthNumberReviews): void
    {
        $this->last12MonthNumberReviews = $last12MonthNumberReviews;
    }

    /**
     * @return int
     */
    public function getPercentageRecommendation(): int
    {
        return $this->percentageRecommendation;
    }

    /**
     * @param int $percentageRecommendation
     */
    public function setPercentageRecommendation(int $percentageRecommendation): void
    {
        $this->percentageRecommendation = $percentageRecommendation;
    }

    /**
     * @return int
     */
    public function getLocationId(): int
    {
        return $this->locationId;
    }

    /**
     * @param int $locationId
     */
    public function setLocationId(int $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * @return string
     */
    public function getLocationName(): string
    {
        return $this->locationName;
    }

    /**
     * @param string $locationName
     */
    public function setLocationName(string $locationName): void
    {
        $this->locationName = $locationName;
    }

    /**
     * @return Review[]
     */
    public function getReviews(): array
    {
        return $this->reviews;
    }

    /**
     * @param Review[] $reviews
     */
    public function setReviews(array $reviews): void
    {
        $this->reviews = $reviews;
    }

}
