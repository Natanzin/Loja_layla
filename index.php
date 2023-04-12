<!doctype html>
<html lang="pt-br">

<head>
  <title>Eudora Ceilândia</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon-16x16.png">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.css">
  <style>
    .treeLines {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    h6.twoLines {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
</head>


<body style="min-width: 255px;">
  <!--BARRA DE NAVEGAÇÃO-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
    <div class="container">
      <!--LOGO-->
      <a class="navbar-brand" href="?page=produtos"><strong>Eudora Ceilandia</strong></a>
      <!--BOTÃO DE EXPANDIR MENU (MOBILE)-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-expanded="false" aria-controls="collapseExample">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--LINKS DE NAVEGAÇÃO-->
      <div class="navbar-collapse collapse">
        <ul class="navbar-nav flex-grow-1">
          <li class="nav-item">
            <a class="nav-link text-white" href="?page=produtos">Principal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="?page=contato">Contato</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  include("./config/db.php");
  switch (@$_REQUEST["page"]) {
    case "produtos":
      include("./pages/produtos.php");
      break;
    case "contato":
      include("./pages/contato.php");
      break;

    default:
      include('./pages/produtos.php');
      break;
  }
  ?>

  <!--RODAPÉ DO SITE-->
  <footer class="border-top fixed-bottom text-muted bg-light">
    <div class="container">
      <div class="row py-3">
        <div class="col-12 col-md-4 text-center text-md-left">
          &copy; 2023 - Eudora Ceilândia
        </div>
        <div class="col-12 col-md-4 text-center">
          <a href="?page=contato" class="text-decoration-none text-dark">Contato</a>
        </div>
        <div class="col-12 col-md-4 text-center text-md-right">
          <a href="" class="text-decoration-none text-dark">Administrar</a>
        </div>
      </div>
    </div>
  </footer>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>