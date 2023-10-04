<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
extract($_POST);
var_dump($_POST);

$stmt = $pdo->prepare("INSERT INTO usuario (nome, apelido, email, endereco, nascimento,password_hash,id_permissoes) VALUES (:nome, :ape, :email, :end, :niver, :psswd, 2)");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ape', $ape);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':end', $end);
$stmt->bindParam(':niver', $niver);
$stmt->bindParam(':psswd', $psswd);
$stmt->execute();


$stmt = $pdo->query("SELECT * FROM usuario ORDER BY id_usuario DESC LIMIT 1;");
$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
$id = $resul[0]['id_usuario'];

$stmt = $pdo->prepare("UPDATE class SET id_teacher = :permissao WHERE id_class = :id");
$stmt->bindParam(':permissao', $id, PDO::PARAM_INT);
$stmt->bindParam(':id', $id_class, PDO::PARAM_INT);
$stmt->execute();

$stmt3 = $pdo->query("SELECT c.id_curso AS curso_id, c.curso, u1.nome,cl.id_class
FROM cursos c
LEFT JOIN class cl ON c.id_curso = cl.id_curso
LEFT JOIN usuario u1 ON cl.id_teacher = u1.id_usuario;");
$resul3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['class'] = $resul3;


$stmt5 = $pdo->query("SELECT u.*, c.*, s.*
        FROM usuario u
        LEFT JOIN class c ON u.id_usuario = c.id_teacher
        LEFT JOIN cursos s ON c.id_curso = s.id_curso
        WHERE u.id_permissoes = 2");
$resul5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['teachers'] = $resul5;

header('location: /src/index.php?rota=adm_T');
