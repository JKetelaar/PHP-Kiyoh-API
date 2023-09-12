<?php

declare(strict_types=1);

/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Model;

class Company
{
    /**
     * @var Review[]
     */
    private array $reviews;

    /**
     * Company constructor.
     */
    public function __construct(
        private float $averageRating,
        private int $numberReviews,
        private float $last12MonthAverageRating,
        private int $last12MonthNumberReviews,
        private int $percentageRecommendation,
        private int $locationId,
        private string $locationName
    ) {
    }

    public function getAverageRating(): float
    {
        return $this->averageRating;
    }

    public function setAverageRating(float $averageRating): self
    {
        $this->averageRating = $averageRating;

        return $this;
    }

    public function getNumberReviews(): int
    {
        return $this->numberReviews;
    }

    public function setNumberReviews(int $numberReviews): self
    {
        $this->numberReviews = $numberReviews;

        return $this;
    }

    public function getLast12MonthAverageRating(): float
    {
        return $this->last12MonthAverageRating;
    }

    public function setLast12MonthAverageRating(float $last12MonthAverageRating): self
    {
        $this->last12MonthAverageRating = $last12MonthAverageRating;

        return $this;
    }

    public function getLast12MonthNumberReviews(): int
    {
        return $this->last12MonthNumberReviews;
    }

    public function setLast12MonthNumberReviews(int $last12MonthNumberReviews): self
    {
        $this->last12MonthNumberReviews = $last12MonthNumberReviews;

        return $this;
    }

    public function getPercentageRecommendation(): int
    {
        return $this->percentageRecommendation;
    }

    public function setPercentageRecommendation(int $percentageRecommendation): self
    {
        $this->percentageRecommendation = $percentageRecommendation;

        return $this;
    }

    public function getLocationId(): int
    {
        return $this->locationId;
    }

    public function setLocationId(int $locationId): self
    {
        $this->locationId = $locationId;

        return $this;
    }

    public function getLocationName(): string
    {
        return $this->locationName;
    }

    public function setLocationName(string $locationName): self
    {
        $this->locationName = $locationName;

        return $this;
    }

    /**
     * @return array<int, Review>
     */
    public function getReviews(): array
    {
        return $this->reviews;
    }

    /**
     * @param array<int, Review> $reviews
     */
    public function setReviews(array $reviews): self
    {
        $this->reviews = $reviews;

        return $this;
    }
}
