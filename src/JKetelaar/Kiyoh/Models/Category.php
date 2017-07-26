<?php
/**
 * Created by PhpStorm.
 * User: elwin <elwin@reprovinci.nl>
 * Date: 7/26/17
 * Time: 2:00 PM
 */

namespace JKetelaar\Kiyoh\Models;

/**
 * Class Category
 *
 * @package JKetelaar\Kiyoh\Models
 */
class Category
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /**
     * Category constructor.
     *
     * @param int    $id
     * @param string $title
     */
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Category
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}
