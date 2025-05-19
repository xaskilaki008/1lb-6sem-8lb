<?php

class CustomFormValidation {
    private $rules = [];
    protected $errors = [];

    public function __construct() {
        $this->rules = [];
        $this->errors = [];
    }
    public function setRule($fieldName, $validatorName) {
        $this->rules[$fieldName][] = $validatorName;
    }

    public function isNotEmpty($data) {
        return !empty(trim($data));
    }

    public function isInteger($data) {
        return filter_var($data, FILTER_VALIDATE_INT) !== false;
    }

    public function isLess($data, $value) {
        if ($this->isInteger($data) && intval($data) < $value) {
            return "Значение должно быть не меньше " . $value;
        }
        return null;
    }

    public function isGreater($data, $value) {
        if ($this->isInteger($data) && intval($data) > $value) {
            return "Значение должно быть не больше " . $value;
        }
        return null;
    }
    
    public function isGenderSelected($data) {
        return !empty($data);
    }

    public function isEmail($data) {
        return filter_var($data, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function validate($postArray) {
        foreach ($this->rules as $field => $validators) {
            foreach ($validators as $validator) {
                switch ($validator) {
                    case 'notEmpty':
                        if (!$this->isNotEmpty($postArray[$field] ?? '')) {
                            $this->errors[$field][] = "Поле " . $field . " не должно быть пустым.";
                        }
                        break;
                    case 'integer':
                        if (!$this->isInteger($postArray[$field] ?? '')) {
                            $this->errors[$field][] = "Поле " . $field . " должно быть целым числом.";
                        }
                        break;
                    case 'email':
                        if (!$this->isEmail($postArray[$field] ?? '')) {
                            $this->errors[$field][] = "Поле " . $field . " должно быть корректным email.";
                        }
                        break;
                }
            }
        }
    }

    public function showErrors() {
        $errorHTML = '';
        if (!empty($this->errors)) {
            foreach ($this->errors as $field => $messages) {
                foreach ($messages as $message) {
                    $errorHTML .= "<div class='error'>{$message}</div>";
                }
            }
        }
        return $errorHTML;
    }

    public function getErrors() {
        return $this->errors;
    }
}
?>
