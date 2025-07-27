<?php
require_once '../Model/Tutctuc.php';

class TutctucController {
    public function index() {
        $model = new Tutctuc("Hello world from Model!");
        
        // Передаем сообщение из модели в view
        $helloText = $model->getMessage();
        
        require '../View/tutctuc_view.php';
    }
}