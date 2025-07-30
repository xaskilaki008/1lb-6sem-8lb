<?php
require_once '../1lb-6sem-8lb/Model/Education.php';

class EducationController {
    private $model;

    public function __construct() {
        $this->model = new Education();
    }

    public function index() {
        $curriculum = $this->model->getCurriculum();
        include '../1lb-6sem-8lb/View/education_view.php';
    }
}
?>
