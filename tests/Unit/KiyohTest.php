<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\KiyOh\Tests\Unit;

use JKetelaar\KiyOh\KiyOh;
use PHPUnit\Framework\TestCase;

final class KiyOhTest extends TestCase
{
    const KiyOh_KEY_ENV_KEY = 'KiyOh_KEY';
    const REVIEW_COUNT = 5;

    public function testKiyOh()
    {
        $KiyOhKey = getenv(self::KiyOh_KEY_ENV_KEY);
        $this->assertNotFalse($KiyOhKey);

        $KiyOh = new KiyOh($KiyOhKey, self::REVIEW_COUNT);

        $company = $KiyOh->getCompany();
        $this->assertNotNull($company);

        $averageRating = $company->getAverageRating();
        $this->assertGreaterThan(0, $averageRating);

        $reviews = $KiyOh->getCompany()->getReviews();
        $this->assertNotNull($reviews);
        $this->assertEquals(self::REVIEW_COUNT, count($reviews));
    }
}
