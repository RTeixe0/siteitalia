<?php
session_start();

$usuario = $_POST['usuario'];
$senhaLimpa = $_POST['senha'];

include "../database/conection.php";

$sql = "SELECT senha FROM usuarios WHERE usuario = :user";

$resultado = $conn->prepare($sql);
$resultado->bindParam(':user', $usuario);
$resultado->execute();

$linha = $resultado->fetch();

if ($linha) {
    if (password_verify($senhaLimpa, $linha['senha'])) {
        $_SESSION['usuario_logado'] = $usuario;
        header('Location: painel.php');
    } else {
        header('Location: usuario-erro.php');
    }
} else {
    header('Location: usuario-erro.php');
}
?>
