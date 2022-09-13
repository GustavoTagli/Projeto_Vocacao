<?php 
  require('php/conexao.php');

  try{
    $cd = $_GET['cd'];
    $sql_instituicao = $pdo->prepare("SELECT * FROM instituicao WHERE cd_instituicao = $cd");
    $sql_instituicao->execute();
    $cd_verificado = $sql_instituicao->fetchAll(PDO::FETCH_COLUMN)[0];
    if ($cd_verificado == "") {
      header('location: instituicoes.php');
    }else{
      $sql_instituicao = "SELECT * FROM instituicao WHERE cd_instituicao = $cd";
      $consulta_instituicao = $pdo->query($sql_instituicao);
      while($linha_instituicao = $consulta_instituicao->fetch()){
        $nome = $linha_instituicao[1];
        $cep = $linha_instituicao[4];
        $cidade = $linha_instituicao[5];
        $uf = $linha_instituicao[6];
        $rua_num = $linha_instituicao[8];
        $foto_sobre = $linha_instituicao[13];
        $ds = $linha_instituicao[11];
      }
    }
  }
  catch (Exception $e){
    header('location: instituicoes.php');
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
  <link rel="stylesheet" href="css/instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Instituição</title>
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

  <div class="instituicao">
    <div class="container">
      <section>
        <h1 class="titulo-1"><?php echo $nome; ?></h1>
        <article class="foto-instituicao">
          <figure>
            <img src="<?php echo "img/upload/" . $foto_sobre ?>" alt="">
          </figure>
          <p class="paragrafo end">End: <?php echo $rua_num . ". " . $cidade . "/" . $uf . ". CEP: " . $cep?></p>
        </article>
        <article class="texto-instituicao">
          <h2 class="titulo-2">Sobre a instituição</h2>
          <p class="paragrafo"><?php echo nl2br(htmlentities($ds, ENT_QUOTES, 'UTF-8'))?></p>
        </article>
      </section>
    </div>
  </div>

  <div class="cursos-instituicao">
    <div class="container">
      <h2 class="titulo-2">Cursos - <?php echo $nome; ?></h2>
      <p class="paragrafo">Clique em um curso para ver mais detalhes.</p>
      <section class="cursos">
        <article class="row">
          <?php
          $sql_curso_instituicao = "SELECT * FROM curso_instituicao WHERE cd_instituicao = $cd";
          $consulta_curso_instituicao = $pdo->query($sql_curso_instituicao);
          while($linha_curso_instituicao = $consulta_curso_instituicao->fetch()){
            $cd_ci = $linha_curso_instituicao[0];

            $sql_curso = "SELECT * FROM curso WHERE cd_curso = $cd_ci";
            $consulta_curso = $pdo->query($sql_curso);
            while($linha_curso = $consulta_curso->fetch()){
              $logo_curso = $linha_curso[6];
          ?>
          <a href="curso_instituicao.php?id=<?php echo $cd_ci . '&cd=' . $cd ?>">
            <div class="card">
              <img src="<?php echo $logo_curso?>" class="card-img-top" alt="">
            </div>
          </a>
          <?php }} ?>
        </article>
      </section>
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