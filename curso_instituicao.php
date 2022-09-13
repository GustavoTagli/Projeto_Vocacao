<?php 
require('php/conexao.php');

  try{
    $id = $_GET['id'];
    $cd = $_GET['cd'];

    $sql_ci = $pdo->prepare("SELECT * FROM curso_instituicao WHERE cd_curso = $id and cd_instituicao = $cd");
    $sql_ci->execute();
    $ci_verificado = $sql_ci->fetchAll(PDO::FETCH_COLUMN)[0];

    if ($ci_verificado == "") {
      header('location: instituicao.php?cd=' . $cd . '');
    }
    else{
      $sql_curso = "SELECT * FROM curso WHERE cd_curso = $id";
      $consulta_curso = $pdo->query($sql_curso);
      while($linha_curso = $consulta_curso->fetch()){
        $nm_curso = $linha_curso[1];
        $ds_curso = $linha_curso[2];
        $ds_formacao = $linha_curso[3];
        $qt_duracao_curso = $linha_curso[4];
      }

      $sql_instituicao = "SELECT * FROM instituicao WHERE cd_instituicao = $cd";
      $consulta_instituicao = $pdo->query($sql_instituicao);
      while($linha_instituicao = $consulta_instituicao->fetch()){
        $nm_instituicao = $linha_instituicao[1];
        $ds_instituicao = $linha_instituicao[11];
        $mec_instituicao = $linha_instituicao[9];
        $cidade_instituicao = $linha_instituicao[5];
        $uf_instituicao = $linha_instituicao[6];
        $foto_sobre = $linha_instituicao[13];
      }

      $sql_curso_instituicao = "SELECT * FROM curso_instituicao WHERE cd_curso = $id and cd_instituicao = $cd";
      $consulta_curso_instituicao = $pdo->query($sql_curso_instituicao);
      while($linha_ci = $consulta_curso_instituicao->fetch()){
        $ds_ci = $linha_ci[2];
        $qt_duracao_ci = $linha_ci[3];
        $ds_img_ci = $linha_ci[4];
      }
    }
  }
  catch (Exception $e){
    header('location: instituicao.php?cd=' . $cd . '');
  }
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
  <link rel="stylesheet" href="css/curso_instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Curso</title>
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

  <div class="curso">
    <div class="container">
      <div class="cabecalho">
        <section>
          <h1 class="titulo-1"><?php echo $nm_curso?></h1>
          <h5 class="titulo-5"><?php echo $nm_instituicao ?></h5>
          <article class="info-curso">
            <h6 class="titulo-6">Área de Atuação</h6>
            <p class="paragrafo"><?php echo $ds_formacao?></p>
          </article>

          <article class="info-curso duracao">
            <h6 class="titulo-6">Duração</h6>
            <p class="paragrafo"><?php if(isset($qt_duracao_ci)) echo nl2br(htmlentities($qt_duracao_ci, ENT_QUOTES, 'UTF-8')); else echo $qt_duracao_curso . " anos"?></p>
          </article>
        </section>

        <section>
          <article class="foto-instituicao">
            <figure>
            <?php if(isset($ds_img_ci)){ ?>
              <img src="<?php echo "img/upload/" . $ds_img_ci?>" alt="">
            <?php }?>
            </figure>
          </article>
        </section>
      </div>
    </div>
  </div>

  <div class="sobre-curso">
    <div class="container">
      <section>
        <article class="texto-curso">
          <h2 class="titulo-2">Sobre o curso</h2>
          <p class="paragrafo"><?php if(isset($ds_ci)) echo nl2br(htmlentities($ds_ci, ENT_QUOTES, 'UTF-8')); else echo $ds_curso?></p>
        </article>
      </section>
    </div>
  </div>

  <div class="instituicoes">
    <div class="container">
      <h2 class="titulo-2">Informações <?php echo $nm_instituicao?></h2>

      <a class="card_instituicao" href="instituicao.php?cd=<?php echo $cd?>">
        <div class="card">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="<?php if(isset($foto_sobre)) echo 'img/upload/' . $foto_sobre;?>" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="titulo-5"><?php echo $nm_instituicao?></h5>
                <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; "><?php echo $ds_instituicao?></p>
                <p class="card-text">
                  Nota Mec:
                    <?php 
                    for($i=1; $i<=intval($mec_instituicao); $i++){
                      ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 18">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                      </svg>
                      <?php
                      }
                      ?>
                  (<?php echo $mec_instituicao ?>/5)
                </p>
                <p class="card-text"><?php echo $cidade_instituicao?>, <?php echo $uf_instituicao?></p>
              </div>
            </div>
          </div>
        </div>
      </a>

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

</body>
</html>