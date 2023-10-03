<?php

class User{

    public function Login($e)
    {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->bindParam(':email', $e, PDO::PARAM_STR);
        $stmt->execute();

        $stmt2 = $pdo->query("SELECT * 
        FROM usuario u 
        INNER JOIN permissoes p 
        ON u.id_permissoes = p.id_permissao");
        $resul2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['user2']= $resul2;

        $stmt3 = $pdo->query("SELECT *
        FROM class cl
        INNER JOIN cursos c ON cl.id_curso = c.id_curso;
        ");
        $resul3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['class']= $resul3;

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $_SESSION['user']= $user[0];
        }else{
            
            $_SESSION["erro"] = "Incorrect password or email";
            //header("location: /src/index.php?erro=true");
        }
    }

    public function Logged($p){
        if($_SESSION['user']['password_hash'] === $p){
            require_once($_SERVER["DOCUMENT_ROOT"] . "/src/controllers/PermissionsControllers.php");
            $login = new Permission();
            $login->typePerm();
        }else{
            $_SESSION["erro"] = "Incorrect password or email";
            //header("location: /src/index.php?erro=true");
        }
    }

    
}