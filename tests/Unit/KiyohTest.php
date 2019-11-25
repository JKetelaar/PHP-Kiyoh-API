<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Tests\Unit;

use JKetelaar\Kiyoh\Kiyoh;
use PHPUnit\Framework\TestCase;

final class KiyohTest extends TestCase
{
    const REVIEW_COUNT = 5;

    public function testKiyoh()
    {
        $kiyohKey = getenv('KIYOH_KEY');
        $this->assertNotFalse($kiyohKey);

        $kiyoh = new Kiyoh($kiyohKey, self::REVIEW_COUNT);

        $company = $kiyoh->getCompany();
        $this->assertNotNull($company);

        $averageRating = $company->getAverageRating();
        $this->assertGreaterThan(0, $averageRating);

        $reviews = $kiyoh->getCompany()->getReviews();
        $this->assertNotNull($reviews);
        $this->assertEquals(self::REVIEW_COUNT, count($reviews));
    }
}
