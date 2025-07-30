<?php
require_once '../1lb-6sem-8lb/Model/User.php';
class IndexController {
    public function index() {
        $user = new User("Шпаков П.Н.", "Студент группы ПИ/б-22-2-о", "Лабораторная №1");
        require '../1lb-6sem-8lb/View/index_view.php';
    }
}
?>
