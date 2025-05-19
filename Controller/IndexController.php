<?php
require_once '../mysite/Model/User.php';
class IndexController {
    public function index() {
        $user = new User("Шпаков П.Н.", "Студент группы ПИ/б-22-2-о", "Лабораторная №1");
        require '../mysite/View/index_view.php';
    }
}
?>
