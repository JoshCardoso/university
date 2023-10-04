<?php
session_start();
extract($_POST);

require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");

$stmt = $pdo->query("INSERT INTO cursos(curso) values('$materia');");

$stmt3 = $pdo->query("SELECT c.id_curso AS curso_id, c.curso, u1.nome
FROM cursos c
LEFT JOIN class cl ON c.id_curso = cl.id_curso
LEFT JOIN usuario u1 ON cl.id_teacher = u1.id_usuario;
");
$resul3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['class'] = $resul3;
var_dump($_SESSION['class']);
header('location: /src/index.php?rota=adm_C');