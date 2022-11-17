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
    const COMPANY_REVIEWS_URL = 'https://www.kiyoh.com/v1/review/feed.xml?hash=%s&limit=%s';

    /**
     * @var string
     */
    private $connectorCode;

    /**
     * @var Client
     */
    private $client;
    /**
     * @var int
     */
    private $reviewCount;

    /**
     * Kiyoh constructor.
     *
     * @param string $connectorCode
     * @param int    $reviewCount   Either a number of reviews to retrieve
     */
    public function __construct(string $connectorCode, int $reviewCount = 10)
    {
        $this->client = new Client();
        $this->connectorCode = $connectorCode;
        $this->reviewCount = $reviewCount;
    }

    /**
     * Gets the 10 latest reviews.
     *
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->parseData($this->getContent());
    }

    /**
     * @param string|null $content
     *
     * @return Model\Company
     */
    protected function parseData(?string $content = null): Model\Company
    {
        if ($content === null) {
            $content = $this->getContent();
        }

        $content = simplexml_load_string($content);

        return ReviewFactory::createCompany($content);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->getClient()->request('GET', $this->getCompanyURL())->getBody()->getContents();
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Returns parsed Recent Company Reviews URL.
     *
     * @return string
     */
    public function getCompanyURL(): string
    {
        return sprintf(self::COMPANY_REVIEWS_URL, $this->connectorCode, $this->reviewCount);
    }
}
