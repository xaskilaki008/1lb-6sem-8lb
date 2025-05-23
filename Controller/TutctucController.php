<?php
require_once '../mysite/Model/Tutctuc.php';

class TutctucController {
    public function index() {
        //Через создание экземпляра модели
        $model = new Tutctuc(); // Используется значение из константы ->
    // $helloText = $model->getMessage();
    // Прямой доступ к константе без создания экземпляра->
        $helloText = Tutctuc::MessagerHello;
        
        require '../mysite/View/tutctuc_view.php';
    }
}