<?php
/**
 * Created by PhpStorm.
 * User: elwin <elwin@reprovinci.nl>
 * Date: 7/26/17
 * Time: 2:00 PM
 */

namespace JKetelaar\Kiyoh\Models;

/**
 * Class Company
 *
 * @package JKetelaar\Kiyoh\Models
 */
class Company
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $url;

    /** @var Category */
    private $category;

    /** @var float */
    private $totalScore;

    /** @var AverageScores */
    private $averageScores;

    /** @var int */
    private $totalReviews;

    /** @var int */
    private $totalViews;

    /**
     * Company constructor.
     *
     * @param int           $id
     * @param string        $name
     * @param string        $url
     * @param Category      $category
     * @param float         $totalScore
     * @param AverageScores $averageScores
     * @param int           $totalReviews
     * @param int           $totalViews
     */
    public function __construct(
        $id,
        $name,
        $url,
        Category $category,
        $totalScore,
        AverageScores $averageScores,
        $totalReviews,
        $totalViews
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->category = $category;
        $this->totalScore = $totalScore;
        $this->averageScores = $averageScores;
        $this->totalReviews = $totalReviews;
        $this->totalViews = $totalViews;
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
     * @return Company
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Company
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Company
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalScore()
    {
        return $this->totalScore;
    }

    /**
     * @param float $totalScore
     * @return Company
     */
    public function setTotalScore($totalScore)
    {
        $this->totalScore = $totalScore;

        return $this;
    }

    /**
     * @return AverageScores
     */
    public function getAverageScores()
    {
        return $this->averageScores;
    }

    /**
     * @param AverageScores $averageScores
     * @return Company
     */
    public function setAverageScores($averageScores)
    {
        $this->averageScores = $averageScores;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalReviews()
    {
        return $this->totalReviews;
    }

    /**
     * @param int $totalReviews
     * @return Company
     */
    public function setTotalReviews($totalReviews)
    {
        $this->totalReviews = $totalReviews;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalViews()
    {
        return $this->totalViews;
    }

    /**
     * @param int $totalViews
     * @return Company
     */
    public function setTotalViews($totalViews)
    {
        $this->totalViews = $totalViews;

        return $this;
    }
}
