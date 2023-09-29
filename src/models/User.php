<?php

class User{

    public function Login($e)
    {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->bindParam(':email', $e, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['user']= $user[0];
        }else{
            session_start();
            $_SESSION["erro"] = "Incorrect password or email";
            header("location: /src/index.php?erro=true");
        }
    }

    public function Logged($p){
        if($_SESSION['user']['password_hash'] === $p){
            require_once($_SERVER["DOCUMENT_ROOT"] . "/src/controllers/PermissionsControllers.php");
            $login = new Permission();
            $login->typePerm();
        }else{
            $_SESSION["erro"] = "Incorrect password or email";
            header("location: /src/index.php?erro=true");
        }
    }
}