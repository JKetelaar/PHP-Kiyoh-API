<?php

declare(strict_types=1);

namespace JKetelaar\Kiyoh\Tests\Unit\Model;

use JKetelaar\Kiyoh\Model\ReviewContent;
use PHPUnit\Framework\TestCase;

class ReviewContentTest extends TestCase {

    public function test_constructor_sets_the_correct_properties(): void {
        $reviewContent = new ReviewContent(
            group: '1',
            type: '1',
            rating: '1',
            order: 1,
            translation: 'nl'
        );

        $this->assertSame('1', $reviewContent->getGroup());
        $this->assertSame('1', $reviewContent->getType());
        $this->assertSame('1', $reviewContent->getRating());
        $this->assertSame(1, $reviewContent->getOrder());
        $this->assertSame('nl', $reviewContent->getTranslation());
    }

    public function test_setters_set_the_correct_properties(): void {
        $reviewContent = new ReviewContent(
            group: '1',
            type: '1',
            rating: '1',
            order: 1,
            translation: 'nl'
        );

        $this->assertSame('1', $reviewContent->getGroup());
        $this->assertSame('1', $reviewContent->getType());
        $this->assertSame('1', $reviewContent->getRating());
        $this->assertSame(1, $reviewContent->getOrder());
        $this->assertSame('nl', $reviewContent->getTranslation());

        $reviewContent->setGroup('2');
        $reviewContent->setType('string');
        $reviewContent->setRating(2);
        $reviewContent->setOrder(2);
        $reviewContent->setTranslation('de');
        $this->assertSame('2', $reviewContent->getGroup());
        $this->assertSame('string', $reviewContent->getType());
        $this->assertSame('2', $reviewContent->getRating());
        $this->assertSame(2, $reviewContent->getOrder());
        $this->assertSame('de', $reviewContent->getTranslation());
    }

    public function test_rating_with_various_types(): void {
        // int types
        $reviewContent = new ReviewContent(
            group: '1',
            type: 'INT',
            rating: '1',
            order: 1,
            translation: 'nl'
        );
        $this->assertSame(1, $reviewContent->getRating());

        // boolean types
        $reviewContent->setType('BOOLEAN');
        $reviewContent->setRating('1');
        $this->assertTrue($reviewContent->getRating());
        $reviewContent->setRating(true);
        $this->assertTrue($reviewContent->getRating());
        $reviewContent->setRating('0');
        $this->assertFalse($reviewContent->getRating());

        // string types
        $reviewContent->setType('jibberish');
        $reviewContent->setRating('1');
        $this->assertSame('1', $reviewContent->getRating());
    }

}
