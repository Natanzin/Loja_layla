<!--CABEÇALHO DO SITE-->
<header class="container">
  <!--CARROSSEL DE SLIDES-->
  <div id="carouselMain" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <!--NAVEGAÇÃO DOS SLIDES
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>-->
    <!--BOTÕES DE CONTROLE DOS SLIDES-->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
    <!--SLIDES-->
    <div class="carousel-inner">
      <div class="carousel-item active text-center">
        <img src="./assets/slides/slidePrincipal.jpg" alt="" data-bs-interval="3000" class="img-fluid d-none d-md-block">
        <img src="./assets/slides/slidePrincipalSmall.jpg" alt="" data-bs-interval="3000" class="img-fluid d-block d-md-none">
      </div>
      <div class="carousel-item text-center">
        <img src="./assets/slides/slideEntrega.jpg" alt="" data-bs-interval="3000" class="img-fluid d-none d-md-block">
        <img src="./assets/slides/slideEntregaSmall.jpg" alt="" data-bs-interval="3000" class="img-fluid d-block d-md-none">
      </div>
      <div class="carousel-item text-center">
        <img src="./assets/slides/slideProdutos.jpg" alt="" data-bs-interval="3000" class="img-fluid d-none d-md-block">
        <img src="./assets/slides/slide01small.jpg" alt="" data-bs-interval="3000" class="img-fluid d-block d-md-none">
      </div>
    </div>
  </div>
  <hr class="mt-3" />
</header>
<!--CORPO DO SITE-->
<main class="mb-5 pb-5">
  <div class="container">
    <div class="row">
      <!--BARRA DE BUSCA-->
      <div class="col-12 col-md-5">
        <form class="justify-content-center justify-content-md-start mb-3 mb-md-0">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Digite aqui o que procura!">
            <button class="btn btn-danger">
              Buscar
            </button>
          </div>
        </form>
      </div>
      <div class="col-12 col-md-7">
        <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
          <!--TIPO DE BUSCA-->
          <form class="ml-3 d-inline-block">
            <Select class="form-select form-select-sm">
              <option>Ordenar pelo nome</option>
              <option>Ordenar pelo menor preço</option>
              <option>Ordenar pelo maior preço</option>
            </Select>
          </form>
          <!--BOTÕES DE NAVEGAÇÃO
          <nav class="d-inline-block">
            <ul class="pagination pagination-sm my-0">
              <li class="page-item">
                <button class="page-link disabled">1</button>
              </li>
              <li class="page-item">
                <button class="page-link">2</button>
              </li>
              <li class="page-item">
                <button class="page-link">3</button>
              </li>
              <li class="page-item">
                <button class="page-link">4</button>
              </li>
              <li class="page-item">
                <button class="page-link">5</button>
              </li>
              <li class="page-item">
                <button class="page-link">6</button>
              </li>
            </ul>
          </nav>-->
        </div>
      </div>
    </div>
    <hr class="mt-3">
    <!--LISTAGEM DOS PRODUTOS-->
    <div class="row g-3">
      <?php

      $sql = "SELECT * FROM produtos WHERE estoque_produto >= 1 ORDER BY nome_produto";
      $res = $conn->query($sql);

      $qtd = $res->num_rows;

      function tirarAcentos($string)
      {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/", "/(ç)/", "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $string);
      }

      if ($qtd > 0) { ?>
        <?php while ($row = $res->fetch_object()) { ?>
          <!--CARD DE PRODUTOS-->
          <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 d-flex align-items-stretch">
            <div style="min-width: 100%;" class="card text-center bg-light">
              <div style="height: 200px;">
                <img src="<?php if ($row->imagem_produto != null) {
                            print $row->imagem_produto;
                          } else {
                            print 'https://yt3.googleusercontent.com/PJlrDB6c6-ci65HF6lZ6MTtk-Ya9sOrYgzJ4mEMvNBSzkGmWmEQKBttJd-Gw-LoM-mYBryzdxg=s900-c-k-c0x00ffffff-no-rj';
                          };  ?>" class="card-img-top" style="height: 200px; object-fit: contain;">
              </div>
              <div class="card-header text-center">
                <?php
                if ($row->produto_promo == 1) {
                  print '<del class="text-black-50"><small>R$' . number_format($row->preco_sugerido_produto, 2, ',', '.') . '</small></del><br><strong class="text-danger">R$' . number_format($row->preco_promo_produto, 2, ',', '.') . '</strong>';
                } else {
                  print '<strong>R$' . number_format($row->preco_sugerido_produto, 2, ',', '.') . '</strong>';
                }
                ?>
              </div>
              <div class="card-body">
                <h6 class="card-title treeLines"><?php print $row->nome_produto ?></h6>
              </div>
              <div class="card-footer">
                <div class="d-block">
                  <?php
                  $textLink = str_replace(" ", "%20", tirarAcentos($row->nome_produto));
                  $textLink = str_replace("+", "%20MAIS%20", $textLink);
                  ?>
                  <a target="_blank" class="btn btn-success" href="<?php print "https://api.whatsapp.com/send?phone=5561992812381&text=Ola,%20quero%20reservar%20o%20produto%0A%0A*" . $textLink . "*" ?>">Reservar produto</a>
                </div>
                <small class="text-success"><?php print $row->estoque_produto ?> unidades em estoque</small>
              </div>
            </div>
          </div>
        <?php } ?>

      <?php } else { ?>
        <p clas="alert alert-danger">Não encontrou resultador!</p>
      <?php } ?>
    </div>
    <hr class="mt-3">

  </div>
</main>