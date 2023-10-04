<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
extract($_POST);
var_dump($_POST);

$stmt = $pdo->prepare("UPDATE usuario SET nome = :nome, apelido = :ape, email = :email, endereco = :end, nascimento = :niver WHERE id_usuario = :id");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ape', $ape);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':end', $end);
$stmt->bindParam(':niver', $niver);
$stmt->bindParam(':id', $id);
$stmt->execute();

$stmt = $pdo->prepare("UPDATE class SET id_teacher = NULL WHERE id_teacher = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$stmt = $pdo->prepare("UPDATE class SET id_teacher = :permissao WHERE id_class = :id");
$stmt->bindParam(':permissao', $id, PDO::PARAM_INT);
$stmt->bindParam(':id', $id_class, PDO::PARAM_INT);
$stmt->execute();

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

$stmt2 = $pdo->query("SELECT * 
FROM usuario u 
INNER JOIN permissoes p 
ON u.id_permissoes = p.id_permissao");
$resul2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['user2'] = $resul2;


$stmt5 = $pdo->query("SELECT u.*, c.*, s.*
FROM usuario u
LEFT JOIN class c ON u.id_usuario = c.id_teacher
LEFT JOIN cursos s ON c.id_curso = s.id_curso
WHERE u.id_permissoes = 2");
$resul5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['teachers'] = $resul5;

header('location: /src/index.php?rota=adm_T');
