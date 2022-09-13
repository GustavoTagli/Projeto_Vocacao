<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="css/parcerias.css" type="text/css">
  <link rel="stylesheet" href="css/modal_login_instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Parcerias</title>
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

  <div class="porque">
    <section class="container">
        <article class="texto-porque">
        <h1 class="titulo-1">Por que ser uma Parceira?</h1>
        <p class="paragrafo">Diversos estudantes têm dúvidas em relação aos cursos e faculdades e é aqui que eles encontram respostas!</p>
        <p class="paragrafo">Sendo parceira, você terá visibilidade de estudantes de todo o país que poderão ler sobre a instituição e ver quais cursos você oferece.</p>
        <p class="paragrafo"></p>
        </article>
    </section>
  </div>

  <a href="#planos" class="rolar"><div class="botao botao-1"></div></a>
  
  <div class="planos" id="planos">
    <section class="container">
      <article class="texto-planos ms-auto">
  			<h1 class="titulo-1">Planos</h1>
        <p class="paragrafo">Descruba mais sobre os nossos planos e faça a sua instituição ser vista por milhares de alunos do país todo!</p>
        <p class="paragrafo">Confira as vantagens de ser nosso parceiro e os detalhes de todos os planos.</p>
        <p class="button"><a href="planos.php">Veja os Planos!</a></p>
      </article>
    </section>
  </div>

  <a href="#seja" class="rolar"><div class="botao botao-2"></div></a>
  
  <div class="seja" id="seja">
  	<section class="container">
      <article class="texto-seja">
        <h1 class="titulo-1">Seja uma Instituição Parceira!</h1>
        <p class="paragrafo">Aqui você tem a chance de gerar ainda mais credibilidade para a faculdade e ter o seu nome em destaque para alunos de todo o Brasil.</p>
        <p class="paragrafo">Ao clicar no botão abaixo, você será redirecionada à pagina de cadastro.</p>
        <p class="button"><a href="cadastro_instituicao.php">Seja Parceira!</a></p>
  		</article>
  	</section>
  </div>
  
  <div class="icon_login position-fixed bottom-0 end-0" data-toggle="modal" data-target="#exampleModal" id="icon_login">
    <figure>
      <span class="position-absolute top-100 start-50 translate-middle mt-1 span_login">Login</span>
      <img src="img/parcerias/login/1.png" alt="">
    </figure>
  </div>

  <!-- Modal login-->
  <div class="modal modal_login fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <h3>Faça seu Login</h3>
          <h4>Entre no seu perfil para ver resultados e informações:</h4>
          <form id="form_login" class="row g-3 form-login" method="post">
            <div class="col-md-12">
              <input type="email" class="form-control" id="email_login" placeholder="E-mail" required>
              <input type="password" autocomplete="on" class="form-control" id="senha_login" placeholder="Senha" required>
              <p id="invalido" class="position-absolute mt-3 start-50 translate-middle disabled" style="color:#3C808F; font-weight:bold;">E-mail ou senha inválidos!</p>
            </div>
            <div class="col-md-12">
              <button id="btn_login" class="botao_login" type="submit">Entrar</button>
            </div>
            <h4>Não tem conta? <a href="cadastro_instituicao.php" class="login_link">Cadastrar</a></h4>
          </form>
        </div>
      </div>
    </div>
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
  <script type="text/javascript" src="js/login_instituicao.js"></script>

  <script>
    $('.rolar').on('click', function(event){
      event.preventDefault();
      var div = $(this).attr('href');
      var top = $(div).offset().top;
      $('html').scrollTop(top - 75);
    });
  </script>

</body>
</html>