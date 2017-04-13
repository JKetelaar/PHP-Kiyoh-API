<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Models;

class Customer {

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $place;

	/**
	 * Customer constructor.
	 *
	 * @param string $name
	 * @param string $place
	 */
	public function __construct( $name = null, $place = null ) {
		$this->name  = $name;
		$this->place = $place;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getPlace() {
		return $this->place;
	}

	/**
	 * @param string $place
	 */
	public function setPlace( $place ) {
		$this->place = $place;
	}
}