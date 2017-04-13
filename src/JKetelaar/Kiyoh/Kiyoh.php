<?php

namespace JKetelaar\Kiyoh;

use GuzzleHttp\Client;
use JKetelaar\Kiyoh\Models\Customer;
use JKetelaar\Kiyoh\Models\Question;
use JKetelaar\Kiyoh\Models\Review;

/**
 * @author JKetelaar
 */
class Kiyoh {

	const RECENT_COMPANY_REVIEWS_URL = 'https://www.kiyoh.nl/xml/recent_company_reviews.xml?connectorcode=%s&company_id=%s';

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
	 */
	public function __construct( $connectorCode, $companyCode ) {
		$this->connectorCode = $connectorCode;
		$this->companyCode   = $companyCode;
		$this->client        = new Client();
	}

	/**
	 * Gets the 10 latest reviews
	 *
	 * @return Review[]
	 */
	public function getReviews(){
		return $this->parseContent($this->getContent());
	}

	/**
	 * @param string|null $content
	 *
	 * @return Review[]
	 */
	public function parseContent( $content = null ) {
		if ( $content === null ) {
			$content = $this->getContent();
		}

		$reviewsArray = [];
		$content      = simplexml_load_string( $content );
		$reviews      = $content->review_list->review;

		if ( $reviews->count() > 0 ) {
			foreach ( $reviews as $r ) {
				$rCustomer = $r->customer;
				$customer  = new Customer( $this->elementToString( $rCustomer->name ), $this->elementToString( $rCustomer->place ) );

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
				$totalScore = $this->elementToString( $r->totalScore );
				$recommended = $this->elementToString( $r->recommended );
				$pros = $this->elementToString( $r->pros );
				$cons = $this->elementToString( $r->cons );

				$reviewsArray[] = new Review($id, $customer, $date, $totalScore, $questions, $recommended, $pros, $cons);
			}
		}

		return $reviewsArray;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->getClient()->request( 'GET', $this->getRecentCompanyReviewsURL() )->getBody()->getContents();
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
		return sprintf( self::RECENT_COMPANY_REVIEWS_URL, $this->connectorCode, $this->companyCode );
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