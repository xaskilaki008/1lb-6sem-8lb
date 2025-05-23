<?php
require_once '../mysite/Model/Tutctuc.php';

class TutctucController {
    public function index() {
        $model = new Tutctuc("Hello world from Model!");
        
        // Передаем сообщение из модели в view
        $helloText = $model->getMessage();
        
        require '../mysite/View/tutctuc_view.php';
    }
}