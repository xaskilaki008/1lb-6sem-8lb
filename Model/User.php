<?php
class User {
    private $name;
    private $group;

    public function __construct($name, $group) {
        $this->name = $name;
        $this->group = $group;
    }

    public function getName() {
        return $this->name;
    }

    public function getGroup() {
        return $this->group;
    }
}
?>
