<?php
session_start();
extract($_POST);

require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
$stmt = $pdo->query("INSERT INTO cursos(curso) values('$materia');");
$stmt = $pdo->query("SELECT * FROM cursos ORDER BY id_curso DESC LIMIT 1;");
$resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
$curso = $resul[0]['id_curso'];
$stmt2 = $pdo->query("INSERT INTO class(id_curso,id_teacher) values('$curso','$permissao');");
$stmt3 = $pdo->query("SELECT c.id_curso AS curso_id, c.curso, u1.nome,cl.id_class
FROM cursos c
LEFT JOIN class cl ON c.id_curso = cl.id_curso
LEFT JOIN usuario u1 ON cl.id_teacher = u1.id_usuario;
");
$resul3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['class'] = $resul3;

header('location: /src/index.php?rota=adm_C');