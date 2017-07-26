<?php
/**
 * Created by PhpStorm.
 * User: elwin <elwin@reprovinci.nl>
 * Date: 7/26/17
 * Time: 2:12 PM
 */

namespace JKetelaar\Kiyoh\Models;

/**
 * Trait GetQuestionsTrait
 *
 * @package JKetelaar\Kiyoh\Models
 */
trait GetQuestionsTrait
{
    /**
     * @param bool $validOnly
     *
     * @return Question[]
     */
    public function getQuestions($validOnly = false) {
        $questions = $this->questions;
        if ($validOnly === true){
            $questions = [];

            /** @var Question $question */
            foreach ($this->questions as $question){
                if ($question->isValid()){
                    $questions[] = $question;
                }
            }
        }
        return $questions;
    }
}