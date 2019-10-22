<?php

namespace JKetelaar\Kiyoh;

use GuzzleHttp\Client;
use JKetelaar\Kiyoh\Factory\ReviewFactory;
use JKetelaar\Kiyoh\Models\Company;

/**
 * @author JKetelaar
 */
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
     * @param mixed $reviewCount Either a number of reviews to retrieve
     */
    public function __construct($connectorCode, $reviewCount = 10)
    {
        $this->connectorCode = $connectorCode;
        $this->reviewCount = $reviewCount;
        $this->client = new Client();
    }

    /**
     * Gets the 10 latest reviews
     *
     * @return Company
     */
    public function getCompany()
    {
        return $this->parseData($this->getContent());
    }

    /**
     * @param string|null $content
     *
     * @return Models\Company
     */
    protected function parseData($content = null)
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
    public function getContent()
    {
        return
            $this->getClient()->request(
                'GET',
                $this->getCompanyURL()
            )
                ->getBody()
                ->getContents();
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Returns parsed Recent Company Reviews URL
     *
     * @return string
     */
    public function getCompanyURL()
    {
        return sprintf(
            self::COMPANY_REVIEWS_URL,
            $this->connectorCode,
            $this->reviewCount
        );
    }
}
