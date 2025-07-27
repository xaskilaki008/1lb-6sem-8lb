<?php
require_once __DIR__ . '/../Model/Tutctuc.php';

class TutctucController {
    public function index() {
        //Через создание экземпляра модели
        $model = new Tutctuc(); // Используется значение из константы ->
    // $helloText = $model->getMessage();
    // Прямой доступ к константе без создания экземпляра->
        $helloText = Tutctuc::MessagerHello;
        
        require __DIR__ . '/../View/tutctuc_view.php';
    }
}