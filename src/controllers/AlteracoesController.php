<?php
session_start();
extract($_POST);

require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
echo $email;
echo $permissao;

$stmt = $pdo->prepare("UPDATE usuario SET id_permissoes = :permissao WHERE id_usuario = :id");
$stmt->bindParam(':permissao', $permissao, PDO::PARAM_INT);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$stmt2 = $pdo->query("SELECT * FROM usuario u INNER JOIN permissoes p ON u.id_permissoes = p.id_permissao");
$resul2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['user2']= $resul2;

header('location: /src/index.php?rota=adm_P');