<?php
require_once '../Model/Education.php';

class EducationController {
    private $model;

    public function __construct() {
        $this->model = new Education();
    }

    public function index() {
        $curriculum = $this->model->getCurriculum();
        include '../View/education_view.php';
    }
}
?>
