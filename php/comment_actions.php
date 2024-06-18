<?php
include "../database/conection.php"; // Ajuste o caminho conforme necessário
session_start();

// Checa se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit;
}

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Obter a ação e o ID do comentário
$action = $_GET['action'];
$comment_id = $_GET['id'];

// Determinar ação: aprovar ou rejeitar
if ($action == 'approve') {
    $status = 1;  // Aprovado
} elseif ($action == 'reject') {
    $status = 0;  // Rejeitado
} else {
    die('Ação inválida!');
}

// Atualizar o status do comentário
$query = "UPDATE comentarios SET aprovado = :status WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':status', $status, PDO::PARAM_INT);
$stmt->bindParam(':id', $comment_id, PDO::PARAM_INT);
$stmt->execute();

// Redirecionar de volta para a página de administração
header('Location: painel.php');
exit;
?>
