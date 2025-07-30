<?php
require_once '../1lb-6sem-8lb/Model/Tutctuc.php';

class TutctucController {
    public function index() {
        $model = new Tutctuc("Hello world from Model!");
        
        // Передаем сообщение из модели в view
        $helloText = $model->getMessage();
        
        require '../1lb-6sem-8lb/View/tutctuc_view.php';
    }
}