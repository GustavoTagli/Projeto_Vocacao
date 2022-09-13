<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="css/modal_cadastro_candidato.css" type="text/css">
  <link rel="stylesheet" href="css/index.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação</title>
</head>
<body>
  <header id="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand navbar-alt">
          <a href="index.php">
            <figure style="margin-bottom: 0;">
              <img src="img/logo/logo_atual.png" alt="Logo Vocação">
            </figure>
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">  
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="teste.php">Teste Vocacional</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cursos.php">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="instituicoes.php">Instituições de Ensino</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parcerias.php">Parcerias</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <div class="teste">
    <section class="container">
      <article class="texto-teste">
        <h1 class="titulo-1">Quer uma ajuda em que curso fazer?</h1>
        <p class="paragrafo">Está querendo entender mais sobre o mundo das profissões? Você está no lugar certo!</p>
        <p class="paragrafo">Comece agora a fazer o teste vocacional e descubra quais cursos combinam com você.</p>
        <p class="paragrafo"><a href="teste.php">Saiba mais</a></p>
        <p class="button_modal" data-toggle="modal" data-target="#modal_cadastro_candidato">Faça o Teste!</p>
      </article>
    </section>
  </div>

 <!-- Modal -->
 <div class="modal fade p-0" id="modal_cadastro_candidato" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-header">
          <h5 class="modal-title" id="modal_label">Preencha os campos para realizar o teste:</h5>
        </div>
        <div class="modal-body">
          <form id="form_cadastro_candidato" method="POST">
            <div class="col-md-12">
              <input type="name" class="form-control" id="txt_nome" placeholder="Nome" required>
            </div>
            <div class="col-md-12">
              <input type="email" class="form-control" id="txt_email" placeholder="E-mail" required>
            </div>
      
          </div>
          <div class="modal-footer">
            <div class="botoes">
              <button type="button" id="btn_recusar" class="btn btn_recusar" data-dismiss="modal">Não, obrigado</button>
              <button type="submit" id="btn_comecar" class="btn btn_comecar">Começar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <a href="#instituicoes" class="rolar"><div class="botao botao-1"></div></a>

  <div class="instituicoes" id="instituicoes">
    <section class="container">
      <article class="texto-instituicoes ms-auto">
        <h1 class="titulo-1">Instituições de Ensino</h1>
        <p class="paragrafo">Gostaria de ter oportunidade de ganhar visibilidade por estudantes de todo o país?</p>
        <p class="paragrafo">Saiba mais sobre os nossos planos e mensalidades para tornar-se parceiro.</p>
        <p class="button"><a href="parcerias.php">Seja Parceira!</a></p>
      </article>
    </section>
  </div>

  <a href="#descubra" class="rolar"><div class="botao botao-2"></div></a>

  <div class="descubra" id="descubra">
    <section class="container">
      <h2 class="titulo-2">Descubra mais sobre os Cursos e as Instituições</h2>
      <article class="row justify-content-around">
        <div id="card-1" class="card">
          <a href="cursos.php" id="card-img"><img src="img/index/cursos.png" class="card-img-top" alt="Menina estudando"></a>
          <h3 class="titulo-3"><a href="cursos.php" id="card-titulo">Cursos e Graduações</a></h3>
          <p class="paragrafo">Encontre mais informações sobre os cursos e graduações disponíveis no mercado.</p>
        </div>
        <div id="card-2" class="card">
          <a href="teste.php" id="card-img"><img src="img/index/sobre_teste.png" class="card-img-top" alt="Mulher lendo"></a>
          <h3 class="titulo-3"><a href="teste.php" id="card-titulo">Sobre o Teste Vocacional</a></h3>
          <p class="paragrafo">Realize o teste vocacional para descobrir qual profissão combina com você.</p>
        </div>
        <div id="card-3" class="card">
          <a href="instituicoes.php" id="card-img"><img src="img/index/instituicao_quali.png" class="card-img-top" alt="Jovens em uma Universidade"></a>
            <h3 class="titulo-3"><a href="instituicoes.php" id="card-titulo">Instituições de Qualidade</a></h3>
            <p class="paragrafo">Encontre a faculdade mais próxima de você e vá em direção ao conhecimento.</p>
        </div>
      </article>
    </section>
  </div>
  
  <footer id="footer">
    <div class="container">
      <div class="row justify-content-around">
        <div class="item-footer">
          <div class="navbar-brand navbar-alt">
            <a href="index.php">
              <figure style="margin: 0">
                <img src="img/logo/logo_atual.png" alt="Logo Vocação">
              </figure>
            </a>
          </div>
        </div>
        <nav class="item-footer navbar navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="cursos.php">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teste.php">Teste Vocacional</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="instituicoes.php">Instituições de Ensino</a>
            </li>
          </ul>
        </nav>
        <nav class="item-footer navbar navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="planos.php">Planos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parcerias.php">Parcerias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastro_instituicao.php">Cadastro</a>
            </li>
          </ul>
        </nav>
        <div class="item-footer">
          <h6 class="titulo-6">Fale Conosco</h6>
          <p class="p-footer">(13) 99999-9999</p>
          <p class="p-footer">vocacao@gmail.com</p>
        </div>
        <div class="item-footer">
          <div class="redes-sociais me-auto ms-auto">
            <figure>
              <a href=""><img src="img/redes_sociais/Facebook.png" alt=""></a>
            </figure>
            <figure>
              <a href=""><img src="img/redes_sociais/Instagram.png" alt=""></a>
            </figure>
            <figure>
              <a href=""><img src="img/redes_sociais/Twitter.png" alt=""></a>
            </figure>
            <figure>
              <a href=""><img src="img/redes_sociais/Youtube.png" alt=""></a>
            </figure>
          </div>
          <div class="copy-right">
            <p class="p-footer">© 2021 Vocação - Todos os direitos reservados</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/header_footer.js"></script>
  <script type="text/javascript" src="js/cadastrocandidato.js"></script>

  <script>
    $('.rolar').on('click', function(event){
      event.preventDefault();
      var div = $(this).attr('href');
      var top = $(div).offset().top;
      $('html').scrollTop(top - 75);
    });
  </script>

  <script>
    $('#card-1 #card-img, #card-1 #card-titulo').mouseover(function(){
      $('#card-1 #card-titulo').css('color', '#22238A');
    });
    $('#card-1 #card-img, #card-1 #card-titulo').mouseleave(function(){
      $('#card-1 #card-titulo').css('color', 'black');
    });

    $('#card-2 #card-img, #card-2 #card-titulo').mouseover(function(){
      $('#card-2 #card-titulo').css('color', '#22238A');
    });
    $('#card-2 #card-img, #card-2 #card-titulo').mouseleave(function(){
      $('#card-2 #card-titulo').css('color', 'black');
    });

    $('#card-3 #card-img, #card-3 #card-titulo').mouseover(function(){
      $('#card-3 #card-titulo').css('color', '#22238A');
    });
    $('#card-3 #card-img, #card-3 #card-titulo').mouseleave(function(){
      $('#card-3 #card-titulo').css('color', 'black');
    });
  </script>

</body>
</html>