<?php

declare(strict_types=1);

namespace JKetelaar\Kiyoh\Tests\Unit\Model;

use JKetelaar\Kiyoh\Model\Company;
use JKetelaar\Kiyoh\Model\Review;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase {

    public function test_constructor_sets_the_correct_properties(): void {
        $company = new Company(
            averageRating: 1,
            numberReviews: 1,
            last12MonthAverageRating: 12.0,
            last12MonthNumberReviews: 1000,
            percentageRecommendation: 80,
            locationId: 12,
            locationName: 'test'
        );

        $this->assertSame(1.0, $company->getAverageRating());
        $this->assertSame(1, $company->getNumberReviews());
        $this->assertSame(12.0, $company->getLast12MonthAverageRating());
        $this->assertSame(1000, $company->getLast12MonthNumberReviews());
        $this->assertSame(80, $company->getPercentageRecommendation());
        $this->assertSame(12, $company->getLocationId());
        $this->assertSame('test', $company->getLocationName());

    }
    public function test_setters_set_the_correct_properties(): void {
        $company = new Company(
            averageRating: 1,
            numberReviews: 1,
            last12MonthAverageRating: 12.0,
            last12MonthNumberReviews: 1000,
            percentageRecommendation: 80,
            locationId: 12,
            locationName: 'test'
        );
        $testReview = new Review(
            id: '1',
            author: 'test',
            city: 'test',
            rating: 1,
            comment: 'test',
            dateSince: '2022-01-01',
            updatedSince: '2022-01-01',
            referenceCode: 'test'
        );
        $company->setReviews([$testReview]);
        $this->assertSame(1.0, $company->getAverageRating());
        $this->assertSame(1, $company->getNumberReviews());
        $this->assertSame(12.0, $company->getLast12MonthAverageRating());
        $this->assertSame(1000, $company->getLast12MonthNumberReviews());
        $this->assertSame(80, $company->getPercentageRecommendation());
        $this->assertSame(12, $company->getLocationId());
        $this->assertSame('test', $company->getLocationName());
        $this->assertSame([$testReview], $company->getReviews());

        $company->setAverageRating(2);
        $company->setNumberReviews(2);
        $company->setLast12MonthAverageRating(2);
        $company->setLast12MonthNumberReviews(2);
        $company->setPercentageRecommendation(2);
        $company->setLocationId(2);
        $company->setLocationName('test 2');
        $company->setReviews([$testReview, $testReview]);

        $this->assertSame(2.0, $company->getAverageRating());
        $this->assertSame(2, $company->getNumberReviews());
        $this->assertSame(2.0, $company->getLast12MonthAverageRating());
        $this->assertSame(2, $company->getLast12MonthNumberReviews());
        $this->assertSame(2, $company->getPercentageRecommendation());
        $this->assertSame(2, $company->getLocationId());
        $this->assertSame('test 2', $company->getLocationName());
        $this->assertSame([$testReview, $testReview], $company->getReviews());
    }

}
