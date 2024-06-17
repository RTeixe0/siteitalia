<?php
session_start();

$usuario = $_POST['usuario'];
$senhaLimpa = $_POST['senha'];

// Conecta ao banco de dados
include "../database/conection.php";

// Prepara uma consulta SQL para buscar apenas o usuário
$sql = "SELECT senha FROM usuarios WHERE usuario = :user";

// Preparando e executando a consulta
$resultado = $conn->prepare($sql);
$resultado->bindParam(':user', $usuario);
$resultado->execute();

// Obtém o resultado
$linha = $resultado->fetch();

if ($linha) {
    // Verifica se a senha inserida corresponde à senha hash armazenada no banco
    if (password_verify($senhaLimpa, $linha['senha'])) {
        // Senha correta, iniciar sessão e redirecionar
        $_SESSION['usuario_logado'] = $usuario;
        header('Location: painel.php');
    } else {
        // Senha incorreta, redirecionar para a tela de erro
        header('Location: usuario-erro.php');
    }
} else {
    // Usuário não encontrado
    header('Location: usuario-erro.php');
}
?>
