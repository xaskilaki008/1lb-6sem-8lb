<?php
class Biography {
    private $name;
    private $birthdate;
    private $birthplace;
    private $education;
    private $familyStatus;
    private $contact;

    public function __construct($name, $birthdate, $birthplace, $education, $familyStatus, $contact) {
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->birthplace = $birthplace;
        $this->education = $education;
        $this->familyStatus = $familyStatus;
        $this->contact = $contact;
    }

    public function getName() {
        return $this->name;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getBirthplace() {
        return $this->birthplace;
    }

    public function getEducation() {
        return $this->education;
    }

    public function getFamilyStatus() {
        return $this->familyStatus;
    }

    public function getContact() {
        return $this->contact;
    }
}
?>
