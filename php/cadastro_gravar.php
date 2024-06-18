<?php

include "../database/conection.php"; 

$usuarioCadastrado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (:nome, :email, :usuario, :senha)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senhaHash);
        
        if ($stmt->execute()) {
            $usuarioCadastrado = true;
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    } catch (PDOException $e) {
        echo "Erro ao preparar statement: " . $e->getMessage();
    }
}

$conn = null;  // Fechar a conexão PDO

if ($usuarioCadastrado) {
    echo "<script>
            alert('Usuário cadastrado com sucesso!');
            setTimeout(function() {
                window.location.href = '../index.html';
            }, 1000);
          </script>";
}
?>
