<?php

declare(strict_types=1);

namespace JKetelaar\Kiyoh\Tests\Unit\Factory;

use JKetelaar\Kiyoh\Factory\ReviewFactory;
use JKetelaar\Kiyoh\Model\Company;
use PHPUnit\Framework\TestCase;

class ReviewFactoryTest extends TestCase {

    public function test_it_creates_a_company_with_reviews_and_content():void
    {
        $stub = '<xml>';

        // stub copied from https://raw.githubusercontent.com/mvdnbrk/kiyoh-php-api/2.0/tests/fixtures/feed.xml
        $simpleXml = simplexml_load_file(__DIR__.'/stub.xml');
        $company = ReviewFactory::createCompany($simpleXml);
        $this->assertInstanceOf(Company::class, $company);
        $this->assertSame(1234567, $company->getLocationId());
        $this->assertCount(3, $company->getReviews());
        $this->assertSame(3, $company->getNumberReviews());

        $reviews = $company->getReviews();
        $this->assertSame(10.0, $reviews[0]->getRating());
        $this->assertSame('Amsterdam', $reviews[0]->getCity());

        $content = $reviews[0]->getContentItem('DEFAULT_OVERALL');
        $this->assertSame(0, $content->getOrder());
    }
}
