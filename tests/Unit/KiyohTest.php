<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Tests\Unit;

use JKetelaar\Kiyoh\Kiyoh;
use PHPUnit\Framework\TestCase;

final class KiyohTest extends TestCase
{
    public function testKiyoh()
    {
        $kiyohKey = getenv('KIYOH_KEY');
        $this->assertNotFalse($kiyohKey);

        $kiyoh = new Kiyoh($kiyohKey, 5);

        $company = $kiyoh->getCompany();
        $this->assertNotNull($company);

        $averageRating = $company->getAverageRating();
        $this->assertGreaterThan(0, $averageRating);

        $reviews = $kiyoh->getCompany()->getReviews();
        $this->assertNotNull($reviews);
        $this->assertEquals(5, count($reviews));
    }
}
