<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="https://lipsum.app/16x16" type="image/png">
  <title>Lipsum</title>
  
  <!-- Bootstrap + Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  
  <!-- CSS Personalizado -->
  <link rel="stylesheet" href="assets/styles/app.css">
  <link rel="stylesheet" href="assets/styles/produtos.css">
</head>

<body>
  <!-- Cabeçalho Principal -->
  <header class="bg-cor-primaria">
    <div class="container">
      <div class="row align-items-center py-3">
        <!-- Logo -->
        <div class="col-lg-2 text-center text-lg-start">
          <a href="index.php">
            <img src="https://lipsum.app/148x54" alt="Lipsum" class="logo">
          </a>
        </div>

        <!-- Busca -->
        <div class="col-lg-7">
          <form action="produtos.php" method="GET" class="site-search">
            <div class="input-group">
              <input type="text" name="q" class="form-control rounded-pill py-2 px-4" 
                     placeholder="Escolha seu estilo aqui...">
              <button class="btn btn-outline-secondary rounded-pill ms-2" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
        </div>

        <!-- Usuário e Carrinho -->
        <div class="col-lg-3">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link text-secondary" href="login.php">
                <i class="bi bi-person-fill"></i> Entrar
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary position-relative" href="carrinho.php">
                <i class="bi bi-cart-fill"></i> Carrinho
                <span class="position-absolute top-0 start-100 translate-middle badge bg-danger rounded-pill">3</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>

  <!-- Navegação -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-cor-secundaria sticky-top">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-principal">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="menu-principal">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
              Lipsum
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="produtos.php?categoria=lancamentos">Lançamentos</a></li>
              <li><a class="dropdown-item" href="produtos.php?categoria=classico">Classico</a></li>
              <li><a class="dropdown-item" href="produtos.php?categoria=coloridos">Coloridos</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produtos.php?categoria=textoColorido">Texto Colorido</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="produtos.php?categoria=imagens">Imagens</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>