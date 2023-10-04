<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
extract($_POST);


$stmt = $pdo->prepare("INSERT INTO usuario (nome, apelido, email, endereco, nascimento,password_hash,id_permissoes) VALUES (:nome, :ape, :email, :end, :niver, :psswd, 2)");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ape', $ape);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':end', $end);
$stmt->bindParam(':niver', $niver);
$stmt->bindParam(':psswd', $psswd);
$stmt->execute();


if ($id_class) {
//    $stmt = $pdo->prepare("UPDATE class SET id_curso = :id_curso = :nome WHERE id_teacher = :id");
//    $stmt->bindParam(':id', $id);
//    $stmt->bindParam(':id_curso', $id_class);
//    $stmt->execute();
}

$stmt5 = $pdo->query("SELECT u.*, c.*, s.*
        FROM usuario u
        LEFT JOIN class c ON u.id_usuario = c.id_teacher
        LEFT JOIN cursos s ON c.id_curso = s.id_curso
        WHERE u.id_permissoes = 2");
$resul5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['teachers'] = $resul5;

header('location: /src/index.php?rota=adm_T');
