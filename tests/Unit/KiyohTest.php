<?php

namespace JKetelaar\KiyOh\Tests\Unit;

use JKetelaar\KiyOh\KiyOh;
use PHPUnit\Framework\TestCase;

/**
 * @author JKetelaar
 *
 * Class KiyOhTest.
 *
 * @package JKetelaar\KiyOh\Tests\Unit
 */
final class KiyOhTest extends TestCase
{
    public const KIYOH_KEY_ENV_KEY = 'KIYOH_KEY';
    public const REVIEW_COUNT = 5;

    public function testKiyOh()
    {
        // TODO: This will fail on Pull Requests (@see https://github.com/JKetelaar/PHP-KiyOh-API/pull/16#issuecomment-562236830)
        $kiyohKey = getenv(self::KIYOH_KEY_ENV_KEY);
        $this->assertNotFalse($kiyohKey);

        $kiyoh = new KiyOh($kiyohKey, self::REVIEW_COUNT);

        $company = $kiyoh->getCompany();
        $this->assertNotNull($company);

        $averageRating = $company->getAverageRating();
        $this->assertGreaterThan(0, $averageRating);

        $reviews = $kiyoh->getCompany()->getReviews();
        $this->assertNotNull($reviews);
        $this->assertEquals(self::REVIEW_COUNT, count($reviews));
    }
}
