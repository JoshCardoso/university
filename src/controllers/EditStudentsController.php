<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
extract($_POST);

$stmt = $pdo->prepare("UPDATE usuario SET nome = :nome, apelido = :ape, email = :email, endereco = :end, nascimento = :niver, dni = :dni WHERE id_usuario = :id");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':ape', $ape);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':end', $end);
$stmt->bindParam(':niver', $niver);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':dni', $dni);
$stmt->execute();

$stmt6 = $pdo->query("SELECT *
FROM usuario u
WHERE u.id_permissoes = 3");
$resul6 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['students'] = $resul6;

header('location: /src/index.php?rota=adm_S');