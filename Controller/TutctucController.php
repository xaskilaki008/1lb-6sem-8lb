<?php
require_once '../Model/Tutctuc.php';

class TutctucController {
    public function index() {
        //Через создание экземпляра модели
        $model = new Tutctuc(); // Используется значение из константы ->
    // $helloText = $model->getMessage();
    // Прямой доступ к константе без создания экземпляра->
        $helloText = Tutctuc::MessagerHello;
        
        require '../View/tutctuc_view.php';
    }
}