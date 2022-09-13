<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="css/modal_login_instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/modal_verificacao_email.css" type="text/css">
  <link rel="stylesheet" href="css/cadastro_instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Cadastro</title>
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

  <div id="informacoes" class="informacoes">
    <div class="container">
      <section id="esquerda" class="esquerda">
        <h2 class="titulo-2">Cadastro</h2>
        <p class="paragrafo">Seja parceira da equipe Vocação!</p>
      </section>

      <section id="direitra" class="direita">
        <form id="form_cadastro" method="POST">
          <article id="Step1">
            <h3 class="titulo-3">Escolha um plano</h3>
            <p class="paragrafo text-center">Quer saber mais sobre os planos? <a class="links" href="planos.php">Clique aqui</a></p>
            <div id="planos" class="planos">
              
              <div class="form-check">
                <input class="form-check-input" type="radio" name="planos" id="mensal">
                <label class="form-check-label" for="mensal">
                  <figure>
                    <img src="img/cadastro_instituicao/1.png" alt="">
                  </figure>
                </label>
              </div>
              
              <div class="form-check">
                <input class="form-check-input" type="radio" name="planos" id="semestral">
                <label class="form-check-label" for="semestral">
                  <figure>
                    <img src="img/cadastro_instituicao/2.png" alt="">
                  </figure>
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="planos" id="anual">
                <label class="form-check-label" for="anual">
                  <figure>
                    <img src="img/cadastro_instituicao/3.png" alt="">
                  </figure>
                </label>
              </div>
              
            </div>
          </article>


          <article id="Step2" class="formulario disabledForm">
            <div class="caixas">
              <div class="caixa">
                <input type="text" class="form-control" id="txt_nome" placeholder="Nome" required>
              </div>

              <div class="caixa">
                <input type="email" class="form-control" id="txt_email" placeholder="E-mail" required>
              </div>

              <div class="caixa">
                <input type="text" class="form-control" id="txt_cep" name="txt_cep" max="9" maxlength="9" placeholder="CEP" required>
              </div>

              <div class="caixa rua_num">
                <input type="text" class="form-control" id="txt_endereco" placeholder="Rua" required>
                <input type="number" class="form-control" id="txt_num" placeholder="Número" required>
              </div>

              <div class="caixa cnpj_mec">
                <input type="text" class="form-control" id="txt_cnpj" name="txt_cnpj" max="18" maxlength="18" placeholder="CNPJ" required>
                <input type="number" min="1" max="5" class="form-control" id="mec" name="mec" placeholder="Nota do MEC" required>
              </div>

              <div class="caixa">
                <input type="password" class="form-control" id="txt_senha" autocomplete="on" placeholder="Senha" required>
              </div>

              <div class="caixa">
                <input type="password" class="form-control" id="txt_conf_senha" autocomplete="on" placeholder="Confirmar Senha" required>
              </div>
            </div>
            
            <div class="botoes">
              <button id="btn_cadastrar" class="btn btn_finalizar" type="submit">Cadastrar</button>
              <div id="spinner" class="spinner-border visually-hidden" role="status"></div>
            </div>
          </article>

          <p class="paragrafo text-center login">Já tem cadastro? <a href="" class="links" data-bs-toggle="modal" data-bs-target="#exampleModal">Login</a></p>
        </form>
      </section>
    </div>
  </div>

 <!-- Modal verificacao email -->
 <button id="btn_modal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verificacao_email" style="display: none;"></button>
  <div class="modal  modal_verificacao fade" id="verificacao_email" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <h3>Verifique o seu Email</h3>
            <h4>Efetue o pagamento para poder acessar os benefícios de ser um parceiro.</h4>
            <a href="parcerias.php" type="button" class="btn botao_ok">Ok</a>
          </div>
      </div>
    </div>
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
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/cadastroinstituicao.js"></script>
  <script type="text/javascript" src="js/login_instituicao.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

</body>
</html>