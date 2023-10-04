<?php
session_start();
extract($_POST);
var_dump($_POST);
require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");

$stmt = $pdo->prepare("UPDATE class SET id_teacher = :permissao WHERE id_class = :id");
$stmt->bindParam(':permissao', $permissao, PDO::PARAM_INT);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$stmt3 = $pdo->query("SELECT c.id_curso AS curso_id, c.curso, u1.nome,cl.id_class
FROM cursos c
LEFT JOIN class cl ON c.id_curso = cl.id_curso
LEFT JOIN usuario u1 ON cl.id_teacher = u1.id_usuario;");
$resul3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['class'] = $resul3;


header('location: /src/index.php?rota=adm_C');
