<?php

namespace JKetelaar\KiyOh;

use GuzzleHttp\Client;
use JKetelaar\KiyOh\Model\Company;
use JKetelaar\KiyOh\Factory\ReviewFactory;

/**
 * @author JKetelaar
 *
 * Class KiyOh.
 *
 * @package JKetelaar\KiyOh
 */
class KiyOh
{
    private const COMPANY_REVIEWS_URL = 'https://www.KiyOh.com/v1/review/feed.xml?hash=%s&limit=%s';

    /**
     * @var string
     */
    private string $secret;

    /**
     * Guzzle client, this is used for collecting the data from the KiyOh.com website.
     *
     * @var Client
     */
    private Client $client;

    /**
     * How many reviews should be retrieved.
     *
     * @var int
     */
    private int $reviewCount;

    /**
     * KiyOh constructor.
     *
     * @param string $secret      The api hash used for collecting reviews.
     * @param int    $reviewCount How many reviews should be retrieved.
     */
    public function __construct(string $secret, int $reviewCount = 10)
    {
        $this->client = new Client();
        $this->secret = $secret;
        $this->reviewCount = $reviewCount;
    }

    /**
     * Retrieving the last 10 reviews.
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
        $content ??= $this->getContent();
        $content = simplexml_load_string($content);

        return ReviewFactory::createCompany($content);
    }

    /**
     * Collecting the reviews with the guzzle client.
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->getClient()->request('GET', $this->getCompanyURL())->getBody()->getContents();
    }

    /**
     * Returns the GuzzleClient which will be used for collecting the reviews.
     *
     * @return Client
     */
    private function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Returns parsed Recent Company Reviews URL.
     *
     * @return string
     */
    private function getCompanyURL(): string
    {
        return sprintf(self::COMPANY_REVIEWS_URL, $this->secret, $this->reviewCount);
    }
}
