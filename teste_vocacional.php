<?php
  require("php/conexao.php");

  session_start();
  if((isset($_SESSION['Candidato']) == ""))
  {
    header("location: index.php");
  }

  unset( $_SESSION["vindo_do_resultado"] );

  $sql_pergunta = "SELECT * FROM pergunta";
  $consulta_pergunta = $pdo->query($sql_pergunta);

  $sql_alternativa = "SELECT * FROM alternativa";
  $consulta_alternativa = $pdo->query($sql_alternativa);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="css/teste_vocacional.css" type="text/css">
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

  <div class="fundo">
    <div class="teste container">
      <section class="progresso">
          <h2>Teste Vocacional</h2>
          <p>Responda com sinceridade às perguntas:</p>
          <div class="row h6s">
            <h6>Progresso</h6>
            <h6 id="progresso_texto" class="progresso_texto"></h6>
          </div>
          <div class="progress">
            <div class="progress-bar"></div>
          </div>
      </section>
    
      <form id="formulario" class="questoes" method="POST">
        <?php 
          while($linha_pergunta = $consulta_pergunta->fetch()){
            $cd_pergunta = $linha_pergunta[0];
            $ds_pergunta = $linha_pergunta[1];  
        ?>
        <section class="questao">
        <h3><?php echo $cd_pergunta . ". " . $ds_pergunta;?></h3>
          <?php
            for($i = 0; $i < 5; $i++){
              $linha_alternativa = $consulta_alternativa->fetch();
              $cd_alternativa = $linha_alternativa[0];
              $cd_pergunta = $linha_alternativa[1]; 
              $cd_area_atuacao = $linha_alternativa[2];   
              $ds_alternativa = $linha_alternativa[3];
          ?>
            <div class="form-check">
              <input class="form-check-input escolha" type="radio" <?php echo "name=". '"' . $cd_pergunta.'"' . " value=". '"' . $cd_alternativa. '"'." id=". '"' . $cd_alternativa. '"'?>>
              <label class="rdbButton" <?php echo "for=". '"' . $cd_alternativa.'"'?>>
                <span <?php echo "for=". '"' . $cd_alternativa.'"'?>></span>  
                <label class="form-check-label" <?php echo "for=". '"' . $cd_alternativa.'"'?>>
                    <?php 
                      echo $ds_alternativa;
                    ?>
                </label>
              </label>
            </div>
          <?php
            }
          ?>
          </section>
        <?php 
          }
        ?>
          <div id="pagination-container" class="simple-pagination"></div>
          <div class="spinner">
            <div id="spinner" class="spinner-border visually-hidden" role="status"></div>
          </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>
  <script type="text/javascript" src="js/testevocacional.js"></script>
  <script type="text/javascript" src="js/tratamento.js"></script>
</body>
</html>