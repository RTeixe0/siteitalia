<?php
include "../database/conection.php";
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['jsonFile']) && $_FILES['jsonFile']['size'] > 0) {
    $jsonFile = $_FILES['jsonFile']['tmp_name'];
    $data = file_get_contents($jsonFile);
    $comments = json_decode($data, true);

    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO comentarios (nome, email, comentario, data_hora, aprovado) VALUES (?, ?, ?, NOW(), 0)";

    try {
        $pdo->beginTransaction();
        $stmt = $pdo->prepare($sql);
        foreach ($comments as $comment) {
            $stmt->execute([$comment['nome'], $comment['email'], $comment['comentario']]);
        }
        $pdo->commit();
        echo "<script>alert('Comentários importados com sucesso!');</script>";
        echo "<script>setTimeout(function() { window.location.href = 'painel.php'; }, 1000);</script>";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "<script>alert('Erro ao importar comentários: " . addslashes($e->getMessage()) . "');</script>";
        echo "<script>setTimeout(function() { window.location.href = 'comentarios.php'; }, 1000);</script>";
    }
} else {
    echo "<script>alert('Nenhum arquivo enviado ou arquivo vazio!');</script>";
    echo "<script>setTimeout(function() { window.location.href = 'painel.php'; }, 1000);</script>";
}
?>
 