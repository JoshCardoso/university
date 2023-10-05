<?php 
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
extract($_POST);

$stmt = $pdo->prepare("INSERT INTO usuario (nome, apelido, email, endereco, nascimento,password_hash,id_permissoes,dni) VALUES (:nome, :ape, :email, :end, :niver, :psswd, :dni, 3)");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ape', $ape);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':end', $end);
$stmt->bindParam(':niver', $niver);
$stmt->bindParam(':psswd', $psswd);
$stmt->bindParam(':dni', $dni);
$stmt->execute();

$stmt6 = $pdo->query("SELECT *
FROM usuario u
WHERE u.id_permissoes = 3");
$resul6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['students'] = $resul6;

header('location: /src/index.php?rota=adm_S');