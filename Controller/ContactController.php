<?php
// controllers/ContactController.php
require_once '../1lb-6sem-8lb/Model/FormValidation.php';

class ContactController {
    private $validator;

    public function __construct() {
        $this->validator = new FormValidation();
    }

    public function index() {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->validator->setRule('fullName', 'notEmpty');
            $this->validator->setRule('fullName', 'validName');
            $this->validator->setRule('phone', 'notEmpty');
            $this->validator->setRule('phone', 'validPhone');
            $this->validator->setRule('email', 'notEmpty');
            $this->validator->setRule('email', 'email');
            $this->validator->setRule('message', 'notEmpty');

            $this->validator->setRule('birthday', 'validDate');
            $this->validator->setRule('gender', 'notEmpty');
            $this->validator->setRule('age', 'notEmpty');

            $this->validator->validate($_POST);
            $errors = $this->validator->getErrors();

            if (empty($_POST['gender']) && !isset($errors['gender'])) {
                $errors['gender'] = ["Пол должен быть выбран."];
            }
            
            if (empty($errors)) {
                header('Location: success_page.php');
                exit;
            }
        }

        include '../View/contact_view.php';
    }
}
?>
