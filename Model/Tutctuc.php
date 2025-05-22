<?php
class Tutctuc {
    private $helloworld;

    public function __construct($helloworld) {
        $this->helloworld = $helloworld;
    }

    public function getButton() {
        return $this->helloworld;
    }
}
?>
