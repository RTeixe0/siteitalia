<?php
include "../database/conection.php"; 
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit;
}

$pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$action = $_GET['action'];
$comment_id = $_GET['id'];

if ($action == 'approve') {
    $status = 1;  // Aprovado
} elseif ($action == 'reject') {
    $status = 0;  // Rejeitado
} else {
    die('Ação inválida!');
}

$query = "UPDATE comentarios SET aprovado = :status WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':status', $status, PDO::PARAM_INT);
$stmt->bindParam(':id', $comment_id, PDO::PARAM_INT);
$stmt->execute();

header('Location: painel.php');
exit;
?>
