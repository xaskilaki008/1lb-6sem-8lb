<?php
class Tutctuc {
    const MessagerHello = "Hello world from Model Constant!";
    
    private $message;

    public function __construct($message = null) {
        // сообщение из параметра или из константы, если параметр не указан
        $this->message = $message ?? self::MessagerHello;
    }

    public function getMessage() {
        return $this->message;
    }
    
    // метод для прямого доступа к константе
    public static function getDefaultMessage() {
        return self::MessagerHello;
    }
}