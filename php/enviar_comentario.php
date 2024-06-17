<?php
include "../database/conection.php";

try {
    $stmt = $conn->prepare("INSERT INTO comentarios (nome, email, comentario, data_hora) VALUES (?, ?, ?, NOW())");

    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $comentario);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $comentario = $_POST['comentario'];

    if ($stmt->execute()) {
        echo "<script>
                alert('Comentário enviado com sucesso!');
                setTimeout(function() {
                    window.location.href = 'comentarios.php'; // Altere para a página desejada
                }, 1000);
              </script>";
    } else {
        echo "<script>
                alert('Erro ao enviar o comentário!');
                setTimeout(function() {
                    window.location.href = '../index.html'; // Pode redirecionar para outra página se preferir
                }, 1000);
              </script>";
    }
} catch (PDOException $e) {
    echo "<script>
            alert('Erro ao enviar comentário: {$e->getMessage()}');
            setTimeout(function() {
                window.location.href = '../index.html'; // Pode redirecionar para outra página se preferir
            }, 1000);
          </script>";
}
?>
