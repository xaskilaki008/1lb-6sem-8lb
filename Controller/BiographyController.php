<?php
require_once '../mysite/Model/Biography.php';

class BiographyController {
    public function index() {
        $biography = new Biography(
            "Шпаков П.Н,",
            "21.01.2005",
            "город Симферополь",
            "ФГАОУ ВО «Севастопольский государственный университет» на направлении 'Прикладная информатика'",
            "не женат",
            "Iphone 17 2026, но правду не скажу"
        );
        require '../mysite/View/biography_view.php';
    }
}
?>
