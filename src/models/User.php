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

        $stmt3 = $pdo->query("SELECT c.id_curso AS curso_id, c.curso, u1.nome,cl.id_class
        FROM cursos c
        LEFT JOIN class cl ON c.id_curso = cl.id_curso
        LEFT JOIN usuario u1 ON cl.id_teacher = u1.id_usuario;
        ");
        $resul3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['class']= $resul3;

        $stmt4 = $pdo->query("SELECT * FROM usuario WHERE id_permissoes = 2;");
        $resul4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['teacher']= $resul4;

        $stmt5 = $pdo->query("SELECT u.*, c.*, s.*
        FROM usuario u
        LEFT JOIN class c ON u.id_usuario = c.id_teacher
        LEFT JOIN cursos s ON c.id_curso = s.id_curso
        WHERE u.id_permissoes = 2");
        $resul5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['teachers'] = $resul5;

        $stmt6 = $pdo->query("SELECT *
        FROM usuario u
        WHERE u.id_permissoes = 3");
        $resul6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['students'] = $resul6;

        $stmt7 = $pdo->query("SELECT *
        FROM smateria sm
        INNER JOIN class c ON sm.id_class = c.id_class
        INNER JOIN usuario u ON sm.id_aluno = u.id_usuario
        INNER JOIN cursos co ON c.id_curso = co.id_curso;");
        $resul7 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['aluno_class'] = $resul7;

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