<?php
require_once __DIR__ . '/../Model/User.php';
class IndexController {
    public function index() {
        $user = new User("Шпаков П.Н.", "Студент группы ПИ/б-22-2-о", "Лабораторная №1");
        require __DIR__ . '/../View/index_view.php';
    }
}
?>
