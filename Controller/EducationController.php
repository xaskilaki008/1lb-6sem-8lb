<?php
require_once '../mysite/Model/Education.php';

class EducationController {
    private $model;

    public function __construct() {
        $this->model = new Education();
    }

    public function index() {
        $curriculum = $this->model->getCurriculum();
        include '../mysite/View/education_view.php';
    }
}
?>
