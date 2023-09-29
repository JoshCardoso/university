<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/LoginController.php");

if($_SERVER["REQUEST_METHOD"]==="POST"){
    extract($_POST);
    $index = new index();
    $index->set_email_psswrd($email,$password);
    $index->Log();
}else{
    $index = new index();
    $index->Logar();
}