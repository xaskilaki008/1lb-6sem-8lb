<?php
require_once '../mysite/Model/Tutctuc.php';

class TutctucController {
    public function index() {
        $model = new Tutctuc("Hello world!");
        
        // Проверяем, была ли нажата кнопка
        $showMessage = isset($_POST['show_hello']);
        
        require '../mysite/View/tutctuc_view.php';
    }
}