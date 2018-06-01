<?php

namespace JKetelaar\Kiyoh;

use GuzzleHttp\Client;
use JKetelaar\Kiyoh\Models\AverageScores;
use JKetelaar\Kiyoh\Models\Category;
use JKetelaar\Kiyoh\Models\Customer;
use JKetelaar\Kiyoh\Models\Question;
use JKetelaar\Kiyoh\Models\Review;
use JKetelaar\Kiyoh\Models\Company;

/**
 * @author JKetelaar
 */
class Kiyoh {

	const RECENT_COMPANY_REVIEWS_URL = 'https://www.kiyoh.nl/xml/recent_company_reviews.xml?connectorcode=%s&company_id=%s&reviewcount=%s&showextraquestions=1';

	/**
	 * @var string
	 */
	private $connectorCode;

	/**
	 * @var int
	 */
	private $companyCode;

	/**
	 * @var Client
	 */
	private $client;

	/**
	 * Kiyoh constructor.
	 *
	 * @param string $connectorCode
	 * @param int    $companyCode
	 * @param mixed  $reviewCount Either a number of reviews to retrieve or 'all'
	 */
	public function __construct( $connectorCode, $companyCode, $reviewCount = 10 ) {
		$this->connectorCode = $connectorCode;
		$this->companyCode   = $companyCode;
		$this->reviewCount   = $reviewCount;
		$this->client        = new Client();
	}

	/**
	 * Gets the 10 latest reviews
	 *
	 * @return Review[]
	 */
	public function getReviews(){
		return $this->parseReviews($this->getContent());
	}

    /**
     * Gets company info, category, (average) scores, etc.
     *
     * @return Company
     */
	public function getCompany() {
	    return $this->parseCompany($this->getContent());
    }

	/**
	 * @return string
	 */
	public function getContent() {
		return
            $this->getClient()->request(
                'GET',
                $this->getRecentCompanyReviewsURL()
            )
            ->getBody()
            ->getContents()
        ;
	}

	/**
	 * @return Client
	 */
	public function getClient() {
		return $this->client;
	}

	/**
	 * Returns parsed Recent Company Reviews URL
	 *
	 * @return string
	 */
	public function getRecentCompanyReviewsURL() {
		return sprintf(
		    self::RECENT_COMPANY_REVIEWS_URL,
            $this->connectorCode,
            $this->companyCode,
            $this->reviewCount
        );
	}

    /**
     * @param string|null $content
     *
     * @return Review[]
     */
    protected function parseReviews( $content = null ) {
        if ( $content === null ) {
            $content = $this->getContent();
        }

        $reviewsArray = [];
        $content      = simplexml_load_string( $content );
        $reviews      = $content->review_list->review;
        if ( $reviews->count() > 0 ) {
            foreach ( $reviews as $r ) {
                $rCustomer = $r->customer;
                $customer  = new Customer(
                    $this->elementToString( $rCustomer->name ),
                    $this->elementToString( $rCustomer->place )
                );

                $questions  = [];
                $rQuestions = $r->questions->question;
                foreach ( $rQuestions as $q ) {
                    $id          = $this->elementToString( $q->id );
                    $title       = $this->elementToString( $q->title );
                    $score       = $this->elementToString( $q->score );
                    $questions[] = new Question( $id, $title, $score );
                }

                $id = $this->elementToString( $r->id );
                $date = new \DateTime($this->elementToString( $rCustomer->date ));
                $totalScore = $this->elementToString( $r->total_score );
                $recommended = $this->elementToString( $r->recommendation );
                $pros = $this->elementToString( $r->positive );
                $cons = $this->elementToString( $r->negative );
                $purchase = $this->elementToString( $r->purchase );
                $reaction = $this->elementToString( $r->reaction );

                $reviewsArray[] = new Review(
                    $id,
                    $customer,
                    $date,
                    $totalScore,
                    $questions,
                    $recommended,
                    $pros,
                    $cons,
                    $purchase,
                    $reaction
                );
            }
        }

        return $reviewsArray;
    }

    /**
     * @param string|null $content
     *
     * @return Company
     */
    protected function parseCompany( $content = null ) {
        if ( $content === null ) {
            $content = $this->getContent();
        }

        $content = simplexml_load_string( $content );
        $cCompany = $content->company;

        $questions  = [];
        $cQuestions = $cCompany->average_scores->questions->question;
        foreach ( $cQuestions as $q ) {
            $id          = $this->elementToString( $q->id );
            $title       = $this->elementToString( $q->title );
            $score       = $this->elementToString( $q->score );
            $questions[] = new Question( $id, $title, $score );
        }

        $company = new Company(
            (int) $this->companyCode,
            $this->elementToString($cCompany->name),
            $this->elementToString($cCompany->url),
            new Category(
                (int) $this->elementToString($cCompany->category->id),
                $this->elementToString($cCompany->category->title)
            ),
            (float) $this->elementToString($cCompany->total_score),
            new AverageScores(
                $questions,
                (int) $this->elementToString($cCompany->average_scores->review_amount)
            ),
            (int) $this->elementToString($cCompany->total_reviews),
            (int) $this->elementToString($cCompany->total_views)
        );

        return $company;
    }

	/**
	 * @param \SimpleXMLElement $object
	 *
	 * @return string|null
	 */
	private function elementToString( $object ) {
		$result = $object->__toString();

		return strlen( $result ) > 0 ? $result : null;
	}
}