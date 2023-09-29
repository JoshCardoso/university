<?php

class index {
    private $email;
    private $password;

    public function Logar(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/src/views/login.php");
    }

    public function set_email_psswrd($e, $p) {
        $this->email = $e;
        $this->password = $p;
    }

    public function Log(){
        require_once($_SERVER['DOCUMENT_ROOT'] . "/src/models/User.php");
        $user = new User();
        $user->Login($this->email);
        $user->Logged($this->password);
    }
}

