<?php
include "../database/conection.php";
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit;
}

// Verifica se o arquivo foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['jsonFile'])) {
    $jsonFile = $_FILES['jsonFile']['tmp_name'];
    $data = file_get_contents($jsonFile);
    $comments = json_decode($data, true);

    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO comentarios (nome, comentario, data_hora, aprovado) VALUES (?, ?, NOW(), 0)";

    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare($sql);
        foreach ($comments as $comment) {
            $stmt->execute([$comment['nome'], $comment['comentario']]);
        }
        $pdo->commit();
        echo "Comentários importados com sucesso!";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Erro ao importar comentários: " . $e->getMessage();
    }
} else {
    echo "Nenhum arquivo enviado!";
}
?>
