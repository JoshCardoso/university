<?php
session_start();
$id = $_SESSION['user']['id_usuario'];
extract($_POST);

require_once($_SERVER["DOCUMENT_ROOT"] . "/conf/connection.php");
$stmt = $pdo->query("DELETE FROM smateria WHERE id_materia = $idmath ;");

$stmt8 = $pdo->query("SELECT c.id_class, cu.id_curso, cu.curso
FROM class c
INNER JOIN cursos cu ON c.id_curso = cu.id_curso
WHERE NOT EXISTS (
    SELECT 1
    FROM smateria sm
    WHERE sm.id_class = c.id_class
    AND sm.id_aluno = $id
);");
$resul8 = $stmt8->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['aluno_class_d'] = $resul8;

$stmt7 = $pdo->query("SELECT *
FROM smateria sm
INNER JOIN class c ON sm.id_class = c.id_class
INNER JOIN usuario u ON sm.id_aluno = u.id_usuario
INNER JOIN cursos co ON c.id_curso = co.id_curso;");
$resul7 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['aluno_class'] = $resul7;

header('location: /src/index.php?rota=stu_C');