<?php
require_once __DIR__ . '/../Model/Tutctuc.php';

class TutctucController {
    public function index() {
        $model = new Tutctuc("Hello world from Model!");
        
        // Передаем сообщение из модели в view
        $helloText = $model->getMessage();
        
        require __DIR__ . '/../View/tutctuc_view.php';
    }
}