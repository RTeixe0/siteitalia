<?php

$host = '127.0.0.1';
$db_name = 'siteitalia';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT nome, email, comentario, data_hora FROM comentarios WHERE aprovado = 1 ORDER BY data_hora DESC");
    $stmt->execute();

    $resultados = $stmt->fetchAll();
} catch(PDOException $e) {
    echo "Erro ao conectar com o banco de dados: " . $e->getMessage();
}
?>