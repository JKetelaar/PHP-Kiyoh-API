<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Models;

class Question {

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var int
	 */
	private $score;

	/**
	 * Question constructor.
	 *
	 * @param int    $id
	 * @param string $title
	 * @param int    $score
	 */
	public function __construct( $id, $title, $score ) {
		$this->id    = $id;
		$this->title = $title;
		$this->score = $score;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}

	/**
	 * @return int
	 */
	public function getScore() {
		return $this->score;
	}

	/**
	 * @param int $score
	 */
	public function setScore( $score ) {
		$this->score = $score;
	}

	public function isValid(){
		return $this->score > 0;
	}
}