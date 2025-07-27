<?php
require_once __DIR__ . '/../Model/Biography.php';

class BiographyController {
    public function index() {
        $biography = new Biography(
            "Шпаков П.Н,",
            "секрет",
            "город Симферополь",
            "ФГАОУ ВО «Севастопольский государственный университет» на направлении 'Прикладная информатика'",
            "не женат",
            "а нету телефона"
        );
        require __DIR__ . '/../View/biography_view.php';
    }
}
?>
