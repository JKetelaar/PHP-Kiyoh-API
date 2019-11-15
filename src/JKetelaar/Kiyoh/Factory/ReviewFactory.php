<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Factory;

use JKetelaar\Kiyoh\Models\Company;
use JKetelaar\Kiyoh\Models\Review;
use JKetelaar\Kiyoh\Models\ReviewContent;

class ReviewFactory
{
    public static function createCompany(\SimpleXMLElement $element)
    {
        $averageRating = $element->averageRating;
        $numberReviews = $element->numberReviews;
        $last12MonthAverageRating = $element->last12MonthAverageRating;
        $last12MonthNumberReviews = $element->last12MonthNumberReviews;
        $percentageRecommendation = $element->percentageRecommendation;
        $locationId = $element->locationId;
        $locationName = $element->locationName;

        $company = new Company(
            (float)$averageRating,
            (int)$numberReviews,
            (float)$last12MonthAverageRating,
            (int)$last12MonthNumberReviews,
            (int)$percentageRecommendation,
            (int)$locationId,
            $locationName
        );

        $reviews = [];
        foreach ($element->reviews->reviews as $review) {
            $reviews[] = (self::createReview($review));
        }

        $company->setReviews($reviews);

        return $company;
    }

    public static function createReview(\SimpleXMLElement $element)
    {
        $id = $element->reviewId;
        $author = $element->reviewAuthor;
        $city = $element->city;
        $rating = $element->rating;
        $comments = ( $element->reviewComments ? : '' );
        $dateSince = $element->dateSince;
        $updatedSince = $element->updatedSince;

        $review = new Review($id, $author, $city, (float)$rating, $comments, $dateSince, $updatedSince);
        $review->setContent(self::createReviewContent($element->reviewContent->reviewContent));

        return $review;
    }

    public static function createReviewContent(\SimpleXMLElement $elements)
    {
        $content = [];
        foreach ($elements as $element) {
            $group = $element->questionGroup;
            $type = $element->questionType;
            $rating = $element->rating;
            $order = $element->order;
            $translation = $element->questionTranslation;

            $content[] = new ReviewContent($group, $type, (float)$rating, (int)$order, $translation);
        }

        return $content;
    }
}
