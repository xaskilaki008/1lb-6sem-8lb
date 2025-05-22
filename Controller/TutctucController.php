<?php
require_once '../mysite/Model/Tutctuc.php';
class TutctucController {
    public function index() {
        $helloworld = new Tutctuc("Hello world!");
        require '../mysite/View/tutctuc_view.php';
    }
}
?>
