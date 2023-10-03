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

class Admin {
    public function permission(){
        
        require_once($_SERVER['DOCUMENT_ROOT'] . "/src/views/admin/adm_permicoes.php");
    }
    public function teacher(){
        
        require_once($_SERVER['DOCUMENT_ROOT'] . "/src/views/admin/adm_read_teacher.php");
    }
    public function students(){
        
        require_once($_SERVER['DOCUMENT_ROOT'] . "/src/views/admin/adm_alunos.php");
    }
    public function class(){
        
        require_once($_SERVER['DOCUMENT_ROOT'] . "/src/views/admin/adm_classes.php");
    }
}

class Teacher {
    public function students(){
        
    }
}

class Students {
    public function qualification(){
        
    }
    public function class(){
        
    }
}

class Perfil {
    public function Edit(){
        
    }
    public function Logout(){
    unset($_SESSION['user']);
    session_destroy();
    header("location: index.php");
        
    }
}
