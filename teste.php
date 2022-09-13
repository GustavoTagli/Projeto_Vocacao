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
  <link rel="stylesheet" href="css/teste.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Teste Vocacional</title>
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

  
  <div class="facateste">
    <section class="container">
      <article class="texto-facateste">
        <h1 class="titulo-1">Faça seu Teste Vocacional!</h1>
        <p class="paragrafo">Descruba qual curso ou carreira seguir de acordo com suas características.</p>
        <p class="paragrafo">Se você ainda está em dúvida sobre qual profissão combina com as suas habilidades, aqui você encontra a opção de realizar um teste vocacional.</p>
        <p class="paragrafo">São perguntas simples, mas para respondê-las é preciso autoconhecimento e muita calma!</p>
        <p class="button_modal" data-toggle="modal" data-target="#modal_cadastro_candidato">Começar Teste!</p>
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


  <a href="#explicacao" class="rolar"><div class="botao botao-1"></div></a>

  <div class="explicacao" id="explicacao">
    <section class="container">
      <article class="texto-explicacao ms-auto">
        <h1 class="titulo-1">Para que serve o Teste Vocacional?</h1>
        <p class="paragrafo">O teste vocacional é um instrumento que auxilia os indivíduos a reconhecerem seus atributos, a fim de encontrar um curso compatível a eles. </p>
        <p class="paragrafo">A palavra vocacional vem de “vocação”, que é uma disposição natural e espontânea que orienta uma pessoa no sentido de uma atividade.</p>
        <p class="paragrafo">É importante ressaltar que essa ferramenta não substitui a consulta com um profissional da área.</p>
      </article>
    </section>
  </div>
  
  <a href="#dicas" class="rolar"><div class="botao botao-2"></div></a>

  <div class="dicas" id="dicas">
    <section class="container">
      <article class="texto-dicas">
        <h1 class="titulo-1">Dicas para fazer o teste</h1>
        <p class="paragrafo">Para fazê-lo, é preciso ter consciência de suas peculiaridades e interesses.</p>
        <p class="paragrafo">Sendo assim, antes de começar, procure fazer uma lista dos seus talentos e profissões que o fariam feliz.</p>
        <p class="paragrafo">O resultado do teste deve ser usado apenas como estratégia de autoconhecimento.</p>
        <p class="paragrafo">
            <strong>✓ </strong> Fazer com calma;<br>
            <strong>✓ </strong> Lugar silencioso;<br>
            <strong>✓ </strong> Ler todo o Resultado.
        </p>
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
  
</body>
</html>