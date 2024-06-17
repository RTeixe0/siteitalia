<?php
include "../database/conection.php";
?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cultura</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>

  <div class="login-register-container" style="position: absolute; top: 20px; right: 20px; z-index: 1000; background: none; border: none;">
    <a href="../php/login.php" class="btn btn-login">Login</a>
    <a href="../php/cadastro.php" class="btn btn-register">Cadastre-se</a>
  </div>

  <button onclick="playAudio()" style="position: fixed; top: 80px; right: 20px; z-index: 1000; background: none; border: none;">
    <i class="fas fa-play-circle" style="font-size: 24px; color: black;"></i>
  </button>
  
<audio id="myAudio" autoplay loop>
  <source src="../audio/Inferno.mp3" type="audio/mp3">
</audio>

  <div class="position-relative">

    <header>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../img/cr01.jpg" class="d-block w-100" alt="Imagem 1">
          </div>
          <div class="carousel-item">
            <img src="../img/cr02.jpg" class="d-block w-100" alt="Imagem 2">
          </div>
          <div class="carousel-item">
            <img src="../img/cr03.jpg" class="d-block w-100" alt="Imagem 3">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>
    </header>
    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center mt-2 mt-md-0">
      <div class="logo-container mb-2 mb-md-0">
        <img src="../img/logo01.png" alt="Logo" class="img-fluid" style="max-width: 80%; height: auto;">
      </div>

    </div>
  </div>


  <nav class="navbar navbar-expand-lg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.html">Início <span class="sr-only">(atual)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cultura.html">Cultura</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gastronomia.html">Gastronomia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="locais.html">Locais</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="informacoes.html">Informaçoes</a>
        </li>
      </ul>
    </div>
  </nav>

<!-- Comentários Existentes -->
<div class="container mx-auto comentarios-container">
    <h2 class="centralizado">Comentários</h2>
    <?php
    include '../database/conectioncoment.php'; 
    if (!empty($resultados)) {
        foreach ($resultados as $comentario) {
            echo "<div class='comentario'>";
            echo "<p><strong>Nome:</strong> " . htmlspecialchars($comentario['nome']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($comentario['email']) . "</p>";
            echo "<p><strong>Comentário:</strong> " . htmlspecialchars($comentario['comentario']) . "</p>";
            echo "<p><strong>Data:</strong> " . htmlspecialchars($comentario['data_hora']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum comentário postado ainda.</p>";
    }
    ?>
</div>



    <!-- Formulário de Comentários -->
    <div class="container mx-auto " style="padding-left: 0; padding-right: 0;">
        <h2 class="centralizado">Deixe seu Comentário</h2>
        <form action="../php/enviar_comentario.php" method="post" class="form-centrado">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="comentario">Comentário:</label>
          <textarea class="form-control" id="comentario" name="comentario" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>

    <!-- Footer com Direitos Autorais e Links -->
    <footer>
      <div class="d-flex justify-content-center align-items-center flex-wrap">
        <p>&copy; 2024 Renan Teixeira. Todos os direitos reservados.</p>
        <ul class="list-unstyled d-flex">
          <li><a href="https://github.com/RTeixe0">Github</a></li>
        </ul>
      </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
