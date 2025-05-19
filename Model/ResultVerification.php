<?php

class ResultsVerification extends CustomFormValidation {
    private $correctAnswers;

    public function __construct() {
        parent::__construct();
        
        $this->correctAnswers = [
            'question2' => 'option3',
            'question3' => 'B'
        ];
    }

    public function getResults($postArray) {
        $results = [];
        foreach ($this->correctAnswers as $question => $correctAnswer) {
            if (isset($postArray[$question]) && $postArray[$question] === $correctAnswer) {
                $results[$question] = "Правильный ответ на вопрос \"{$question}\".";
            } else {
                $results[$question] = "Неправильный ответ на вопрос \"{$question}\".";
            }
        }
        return $results;
    }
}

?>
