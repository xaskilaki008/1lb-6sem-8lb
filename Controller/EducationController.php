<?php
require_once __DIR__ . '/../Model/Education.php';

class EducationController {
    private $model;

    public function __construct() {
        $this->model = new Education();
    }

    public function index() {
        $curriculum = $this->model->getCurriculum();
        include __DIR__ . '/../View/education_view.php';
    }
}
?>
