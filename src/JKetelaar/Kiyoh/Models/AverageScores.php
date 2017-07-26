<?php
/**
 * Created by PhpStorm.
 * User: elwin <elwin@reprovinci.nl>
 * Date: 7/26/17
 * Time: 2:04 PM
 */

namespace JKetelaar\Kiyoh\Models;

/**
 * Class AverageScores
 *
 * @package JKetelaar\Kiyoh\Models
 */
class AverageScores
{
    /** @var Question[] */
    private $questions;

    /** @var int */
    private $reviewAmount;

    /**
     * AverageScores constructor.
     *
     * @param Question[] $questions
     * @param int        $reviewAmount
     */
    public function __construct(array $questions, $reviewAmount)
    {
        $this->questions = $questions;
        $this->reviewAmount = $reviewAmount;
    }

    use GetQuestionsTrait;

    /**
     * @param Question[] $questions
     * @return AverageScores
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * @return int
     */
    public function getReviewAmount()
    {
        return $this->reviewAmount;
    }

    /**
     * @param int $reviewAmount
     * @return AverageScores
     */
    public function setReviewAmount($reviewAmount)
    {
        $this->reviewAmount = $reviewAmount;

        return $this;
    }
}
