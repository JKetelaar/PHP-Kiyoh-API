<?php

declare(strict_types=1);

namespace JKetelaar\Kiyoh\Tests\Unit\Model;

use JKetelaar\Kiyoh\Model\Review;
use JKetelaar\Kiyoh\Model\ReviewContent;
use PHPUnit\Framework\TestCase;

class ReviewTest extends TestCase {

    public function test_constructor_sets_the_correct_properties(): void {
        $review = $this->createReview();

        $this->assertSame('1', $review->getId());
        $this->assertSame('test', $review->getAuthor());
        $this->assertSame('test', $review->getCity());
        $this->assertSame(1.0, $review->getRating());
        $this->assertSame('test', $review->getComment());
        $this->assertEquals(
            new \DateTime('2022-01-01'),
            $review->getDateSince()
        );
        $this->assertEquals(
            new \DateTime('2022-01-01'),
            $review->getUpdatedSince()
        );
        $this->assertSame('test', $review->getReferenceCode());
    }

    public function test_setters_set_the_correct_properties(): void {
        $review = $this->createReview();
        $testReviewContent = new ReviewContent(
            group: '1',
            type: '1',
            rating: '1',
            order: 1,
            translation: 'nl'
        );
        $review->setContent([$testReviewContent]);

        $this->assertSame('1', $review->getId());
        $this->assertSame('test', $review->getAuthor());
        $this->assertSame('test', $review->getCity());
        $this->assertSame(1.0, $review->getRating());
        $this->assertSame('test', $review->getComment());
        $this->assertEquals(
            new \DateTime('2022-01-01'),
            $review->getDateSince()
        );
        $this->assertEquals(
            new \DateTime('2022-01-01'),
            $review->getUpdatedSince()
        );
        $this->assertSame('test', $review->getReferenceCode());
        $this->assertSame([$testReviewContent], $review->getContent());

        $review->setId('2');
        $review->setAuthor('test2');
        $review->setCity('test2');
        $review->setRating(2);
        $review->setComment('test2');
        $newDate = new \Datetime('2022-01-02');
        $review->setDateSince($newDate);
        $review->setUpdatedSince($newDate);
        $review->setReferenceCode('test2');
        $review->setContent([$testReviewContent, $testReviewContent]);

        $this->assertSame('2', $review->getId());
        $this->assertSame('test2', $review->getAuthor());
        $this->assertSame('test2', $review->getCity());
        $this->assertSame(2.0, $review->getRating());
        $this->assertSame('test2', $review->getComment());
        $this->assertEquals(
            new \DateTime('2022-01-02'),
            $review->getDateSince()
        );
        $this->assertEquals(
            new \DateTime('2022-01-02'),
            $review->getUpdatedSince()
        );
        $this->assertSame('test2', $review->getReferenceCode());
        $this->assertSame([$testReviewContent, $testReviewContent],
            $review->getContent());
    }

    public function test_group_specific_content(): void {
        $review = $this->createReview();
        $testReviewContentA = new ReviewContent(
            group: 'A',
            type: '1',
            rating: '2',
            order: 1,
            translation: 'nl'
        );
        $testReviewContentB = new ReviewContent(
            group: 'B',
            type: '1',
            rating: '1',
            order: 1,
            translation: 'nl'
        );
        $review->setContent([$testReviewContentA, $testReviewContentB]);

        $this->assertSame($testReviewContentA, $review->getContentItem('A'));
        $this->assertSame($testReviewContentB, $review->getContentItem('B'));

        $review->setContent([$testReviewContentB, $testReviewContentA]);
        $this->assertSame($testReviewContentA, $review->getContentItem('A'));

        $testReviewContentA2 = clone $testReviewContentA;
        $testReviewContentA2->setRating('2');

        $review->setContent([$testReviewContentA, $testReviewContentA2]);
        $this->assertSame($testReviewContentA, $review->getContentItem('A'));
        $this->assertSame('2', $review->getContentItem('A')->getRating());
    }

    public function test_retriveal_of_content_item_from_unknown_group(): void {
        $review = $this->createReview();
        $testReviewContentA = new ReviewContent(
            group: 'A',
            type: '1',
            rating: '1',
            order: 1,
            translation: 'nl'
        );
        $review->setContent([$testReviewContentA]);
        $this->assertNull($review->getContentItem('B'));
    }

    public function test_overwriting_contentItem_for_group(): void {
        $review = $this->createReview();
        $testReviewContentA = new ReviewContent(
            group: 'A',
            type: 'string',
            rating: '2',
            order: 1,
            translation: 'nl'
        );
        $testReviewContentA2 = clone $testReviewContentA;
        $testReviewContentA2->setRating(2);
        $review->setContent([$testReviewContentA, $testReviewContentA2]);
        $this->assertSame('2', $review->getContentItem('A')->getRating());


        $review->setContentItem('A', $testReviewContentA2);
        $this->assertSame('2', $review->getContentItem('A')->getRating());
    }

    public function test_setting_contentItem_with_new_group_returns_review(
    ): void {
        $review = $this->createReview();
        $testReviewContentA = new ReviewContent(
            group: 'A',
            type: 'string',
            rating: '1',
            order: 1,
            translation: 'nl'
        );
        $review = $review->setContent([$testReviewContentA]);
        $this->assertInstanceOf(Review::class, $review);

        $testReviewContentB = clone $testReviewContentA;
        $testReviewContentB->setGroup('B');
        $review = $review->setContentItem('B', $testReviewContentB);
        $this->assertInstanceOf(Review::class, $review);
    }

    public function test_it_catches_exceptions_on_invalid_dates(): void {
        new Review(
            id: '1',
            author: 'test',
            city: 'test',
            rating: 1,
            comment: 'test',
            dateSince: '2asdfasdf',
            updatedSince: '20asdf2asdf01',
            referenceCode: 'test'
        );
        $this->assertTrue(true);
    }

    /**
     * @return \JKetelaar\Kiyoh\Model\Review
     */
    private function createReview(): Review {
        $review = new Review(
            id: '1',
            author: 'test',
            city: 'test',
            rating: 1,
            comment: 'test',
            dateSince: '2022-01-01',
            updatedSince: '2022-01-01',
            referenceCode: 'test'
        );
        return $review;
    }

}
