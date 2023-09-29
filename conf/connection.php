<?php 

try {
    $host="localhost";
    $username="root";
    $password="";
    $dbname="faculdade";
    $dns="mysql:host=$host;dbname=$dbname";

    $pdo = new PDO($dns,$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}