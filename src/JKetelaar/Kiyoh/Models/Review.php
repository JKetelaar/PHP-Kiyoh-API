<?php
/**
 * @author JKetelaar
 */

namespace JKetelaar\Kiyoh\Models;

class Review
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var int
     */
    private $totalScore;

    /**
     * @var Question[]
     */
    private $questions;

    /**
     * @var boolean
     */
    private $recommended;

    /**
     * @var string
     */
    private $pros;

    /**
     * @var string
     */
    private $cons;

    /**
     * @var string
     */
    private $purchase;

    /**
     * @var string
     */
    private $reaction;

    /**
     * Review constructor.
     *
     * @param int        $id
     * @param Customer   $customer
     * @param \DateTime  $date
     * @param int        $totalScore
     * @param Question[] $questions
     * @param bool       $recommended
     * @param string     $pros
     * @param string     $cons
     * @param string     $purchase
     * @param string     $reaction
     */
    public function __construct(
        $id,
        Customer $customer,
        \DateTime $date,
        $totalScore,
        array $questions,
        $recommended,
        $pros = null,
        $cons = null,
        $purchase = null,
        $reaction = null
    ) {
        $this->id = $id;
        $this->customer = $customer;
        $this->date = $date;
        $this->totalScore = $totalScore;
        $this->questions = $questions;
        $this->recommended = $recommended;
        $this->pros = $pros;
        $this->cons = $cons;
        $this->purchase = $purchase;
        $this->reaction = $reaction;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getTotalScore()
    {
        return $this->totalScore;
    }

    /**
     * @param int $totalScore
     */
    public function setTotalScore($totalScore)
    {
        $this->totalScore = $totalScore;
    }

    use GetQuestionsTrait;

    /**
     * @param Question[] $questions
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

    /**
     * @return bool
     */
    public function isRecommended()
    {
        return $this->recommended;
    }

    /**
     * @param bool $recommended
     */
    public function setRecommended($recommended)
    {
        $this->recommended = $recommended;
    }

    /**
     * @return string
     */
    public function getPros()
    {
        return $this->pros;
    }

    /**
     * @param string $pros
     */
    public function setPros($pros)
    {
        $this->pros = $pros;
    }

    /**
     * @return string
     */
    public function getCons()
    {
        return $this->cons;
    }

    /**
     * @param string $cons
     */
    public function setCons($cons)
    {
        $this->cons = $cons;
    }

    /**
     * @return string
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

    /**
     * @param string $purchase
     */
    public function setPurchase($purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * @return string
     */
    public function getReaction()
    {
        return $this->reaction;
    }

    /**
     * @param string $reaction
     */
    public function setReaction($reaction)
    {
        $this->reaction = $reaction;
    }
}