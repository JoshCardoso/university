<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/LoginController.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    extract($_POST);
    $index = new index();
    $index->set_email_psswrd($email, $password);
    $index->Log();
} else {
    if (isset($_SESSION['user'])) {
        extract($_GET);
        if (isset($rota)) {
            switch ($rota) {
                case "adm_P":
                    $admin = new Admin();
                    $admin->permission();
                    break;
                case "adm_T":
                    $admin = new Admin();
                    $admin->teacher();
                    break;
                case "adm_S":
                    $admin = new Admin();
                    $admin->students();
                    break;
                case "adm_C":
                    $admin = new Admin();
                    $admin->class();
                    break;
                case "tea_S":
                    $teacher = new Teacher();
                    $teacher->students();
                    break;
                case "stu_Q":
                    $Students = new Students();
                    $Students->qualification();
                    break;
                case "stu_C":
                    $Students = new Students();
                    $Students->class();
                    break;
                case "perfil":
                    $perfil = new Perfil();
                    $pefil->Edit();
                    break;
                case "logout":
                    $logout = new Perfil();
                    $logout->Logout();
                    break;
                default:
                    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/PermissionsControllers.php");
                    $login = new Permission();
                    $login->typePerm();
                    break;
            }
        }
        if (!isset($rota) && isset($_SESSION['user'])) {
            require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controllers/PermissionsControllers.php");
            $login = new Permission();
            $login->typePerm();
        }
    } else {
        $index = new index();
        $index->Logar();
    }
}
