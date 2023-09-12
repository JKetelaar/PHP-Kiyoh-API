<?php

declare(strict_types=1);

/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh;

use GuzzleHttp\Client;
use JKetelaar\Kiyoh\Factory\ReviewFactory;
use JKetelaar\Kiyoh\Model\Company;

class Kiyoh
{
    public const COMPANY_REVIEWS_URL = 'https://www.kiyoh.com/v1/review/feed.xml?hash=%s&limit=%s';

    private Client $client;

    /**
     * Kiyoh constructor.
     *
     * @param int    $reviewCount  A number of reviews to retrieve
     */
    public function __construct(private string $connectorCode, private int $reviewCount = 10)
    {
        $this->client = new Client();
    }

    /**
     * Gets the 10 latest reviews.
     */
    public function getCompany(): Company
    {
        return $this->parseData($this->getContent());
    }

    protected function parseData(?string $content = null): Model\Company
    {
        if ($content === null) {
            $content = $this->getContent();
        }

        $content = simplexml_load_string($content);

        return ReviewFactory::createCompany($content);
    }

    public function getContent(): string
    {
        return $this->getClient()->request('GET', $this->getCompanyURL())->getBody()->getContents();
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Returns parsed Recent Company Reviews URL.
     */
    public function getCompanyURL(): string
    {
        return sprintf(self::COMPANY_REVIEWS_URL, $this->connectorCode, $this->reviewCount);
    }
}
