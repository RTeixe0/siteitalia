<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Bem vindo a Italia</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
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
          <a class="nav-link" href="../index.html">Início</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="container mx-auto text-center">

    <h1 class="titulo-italia">Cadastro</h1>

    <form action="caminho_para_script_de_processamento" method="POST">

      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="usuario">Usuário:</label>
        <input type="text" class="form-control" id="usuario" name="usuario" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
      </div>


      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>

 
  <footer>
    <div class="d-flex justify-content-center align-items-center flex-wrap">
      <p>&copy; 2024 Renan Teixeira. Todos os direitos reservados.</p>
      <ul class="list-unstyled d-flex">
        <li><a href="https://github.com/RTeixe0">Github</a></li>
      </ul>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
