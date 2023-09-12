<?php

declare(strict_types=1);

/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Factory;

use JKetelaar\Kiyoh\Model\Company;
use JKetelaar\Kiyoh\Model\Review;
use JKetelaar\Kiyoh\Model\ReviewContent;
use SimpleXMLElement;

class ReviewFactory
{
    public static function createCompany(SimpleXMLElement $element): Company
    {
        $company = new Company(
            (float) $element->averageRating,
            (int) $element->numberReviews,
            (float) $element->last12MonthAverageRating,
            (int) $element->last12MonthNumberReviews,
            (int) $element->percentageRecommendation,
            (int) $element->locationId,
            (string) $element->locationName
        );

        $reviews = [];

        foreach ($element->reviews->reviews as $review) {
            $reviews[] = self::createReview($review);
        }

        $company->setReviews($reviews);

        return $company;
    }

    public static function createReview(SimpleXMLElement $element): Review
    {
        $review = new Review(
            (string) $element->reviewId,
            (string) $element->reviewAuthor,
            (string) $element->city,
            (float) $element->rating,
            (isset($element->reviewComments) ? (string) $element->reviewComments : ''),
            (string) $element->dateSince,
            (string) $element->updatedSince,
            (string) $element->referenceCode
        );
        $review->setContent(self::createReviewContent($element->reviewContent->reviewContent));

        return $review;
    }

    /**
     * @param SimpleXMLElement $elements
     *
     * @return array<int, ReviewContent>
     */
    public static function createReviewContent(SimpleXMLElement $elements): array
    {
        $content = [];

        foreach ($elements as $element) {
            $content[] = new ReviewContent(
                (string) $element->questionGroup,
                (string) $element->questionType,
                (string) $element->rating,
                (int) $element->order,
                (string) $element->questionTranslation
            );
        }

        return $content;
    }
}
