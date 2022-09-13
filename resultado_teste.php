<?php 
  require("php/conexao.php");
  session_start();
  if((isset($_SESSION["result"]) == ""))
  {
    header("location: index.php");
  }

  $_SESSION['vindo_do_resultado'] = "ok";
  $resultado_candidato_db = "";
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
  <link rel="stylesheet" href="css/resultado_teste.css" type="text/css">
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

  <div class="resultado">
    <div class="container">
    <h1 class="titulo-1 principal">Candidato, a sua Vocação é:</h1>
    <?php
    $result = $_SESSION["result"];
      for ($i = 0; $i < count($result); $i++) {
        $ds = $pdo->prepare("SELECT ds_area_atuacao FROM area_atuacao WHERE cd_area_atuacao= $result[$i]+1");
        $ds->execute();
        $nm = $pdo->prepare("SELECT nm_area_atuacao FROM area_atuacao WHERE cd_area_atuacao= $result[$i]+1");
        $nm->execute();
        $cd = json_encode($result[$i]+1, JSON_UNESCAPED_UNICODE);
        $sql_cursos = "SELECT * FROM curso where cd_area_atuacao= $cd limit 6";
        $consulta_cursos = $pdo->query($sql_cursos);
      
        $ds=$ds->fetchAll(PDO::FETCH_COLUMN);
        $nm=$nm->fetchAll(PDO::FETCH_COLUMN);
        $resultado = array($nm,$ds);    
    ?>
      <section> 
        <article class="texto_resultado">
          <h1 class="titulo-1">
          <?php
          $nm = json_encode($resultado[0], JSON_UNESCAPED_UNICODE);
          $nm = str_replace( array( '\'','[',']', '"', ',' , ';', '<', '>' ), ' ', $nm);
          $resultado_candidato_db =  $resultado_candidato_db . ' '. $nm . ' ';
          echo $nm;
          ?>
          </h1>
          <p class="paragrafo">
          <?php
          $ds = json_encode($resultado[1], JSON_UNESCAPED_UNICODE);
          $ds = str_replace( array( '\'','[',']', '"', ',' , ';', '<', '>' ), ' ', $ds); 
          echo $ds;
          ?>
          </p>
        </article>
        <article class="cursos_resultado row">
          <?php
          while($linha_curso = $consulta_cursos->fetch()){
            $cd_curso = $linha_curso[0];
            $nm_curso = $linha_curso[1];
            $ds_img_logo_curso = $linha_curso[6];
            ?>
            <a name="cursos" id="<?php echo $cd_curso?>" href="curso.php?id=<?php echo $cd_curso?>">
              <div class="card">
                <img src="<?php echo $ds_img_logo_curso?>" class="card-img-top" alt="">
              </div>
            </a>
            <?php
            }
            ?>
        </article>
      </section>
      <?php
      }
      $sql_candidato = $pdo->prepare('UPDATE candidato SET `ds_resultado_teste` = "'.$resultado_candidato_db.'"');
      $sql_candidato->execute();
      ?>

      <p class="button"><a href="teste_vocacional.php">Refazer Teste</a></p>
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