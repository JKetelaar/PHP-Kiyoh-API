<?php

namespace JKetelaar\KiyOh\Factory;

use SimpleXMLElement;
use JKetelaar\KiyOh\Model\Review;
use JKetelaar\KiyOh\Model\Company;
use JKetelaar\KiyOh\Model\ReviewContent;

/**
 * @author JKetelaar
 *
 * Class ReviewFactory.
 *
 * @package JKetelaar\KiyOh\Factory
 */
class ReviewFactory
{
    /**
     * Creating an instance of Company and passing the API results into the Company constructor.
     *
     * @param SimpleXMLElement $element
     *
     * @return Company
     */
    public static function createCompany(SimpleXMLElement $element): Company
    {
        /** @var $company Company */
        $company = new Company(
            (float) $element->averageRating,
            (int) $element->numberReviews,
            (float) $element->last12MonthAverageRating,
            (int) $element->last12MonthNumberReviews,
            (int) $element->percentageRecommendation,
            (int) $element->locationId,
            $element->locationNamee
        );

        /** @var $reviews Review[] */
        $reviews = [];

        foreach ($element->reviews->reviews as $review) {
            $reviews[] = (self::createReview($review));
        }

        $company->setReviews($reviews);

        return $company;
    }

    /**
     * Creating an instance of review based on the API results.
     *
     * @param SimpleXMLElement $element
     *
     * @return Review
     */
    public static function createReview(SimpleXMLElement $element): Review
    {
        /** @var $reviews Review[] */
        $content = self::createReviewContent($element->reviewContent->reviewContent);

        $review = (new Review(
            $element->reviewId,
            $element->reviewAuthor,
            $element->city,
            (float) $element->rating,
            (isset($element->reviewComments) ? $element->reviewComments : ''),
            $element->dateSince,
            $element->updatedSince
        ));

        $review->setContent($content);

        return $review;
    }

    /**
     * Creating review content for each review instance based on the API results.
     *
     * @param SimpleXMLElement $elements
     *
     * @return array
     */
    public static function createReviewContent(SimpleXMLElement $elements): array
    {
        /** @var $content ReviewContent[] */
        $content = [];

        foreach ($elements as $element) {
            $content[] = new ReviewContent(
                $element->questionGroup,
                $element->questionType,
                $element->rating,
                (int) $element->order,
                $element->questionTranslation
            );
        }

        return $content;
    }
}
