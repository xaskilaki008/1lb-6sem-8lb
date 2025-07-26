<?php
// controllers/TestController.php
require_once '../Model/CustomFormValidation.php';
require_once '../Model/ResultVerification.php';

class TestController {
    private $validator;

    public function __construct() {
        $this->validator = new ResultsVerification();
    }

    public function index() {
        $errors = [];
        $successMessage = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validator->setRule('name', 'notEmpty');
            $this->validator->setRule('group', 'notEmpty');
            $this->validator->setRule('question1', 'notEmpty');
            $this->validator->setRule('question2', 'notEmpty');
            $this->validator->setRule('question3', 'notEmpty');

            $this->validator->validate($_POST);
            $errors = $this->validator->getErrors();

            if (empty($errors)) {
                $results = $this->validator->getResults($_POST);
                $successMessage = "Поздравляю! Вы правильно ответили на все вопросы.";
            }
        }

        include '../mysite/View/test_view.php';
    }
}
?>
