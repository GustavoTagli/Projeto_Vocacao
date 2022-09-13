<?php 
  require("php/conexao.php");

  $sql_cursos = "SELECT * FROM curso ORDER BY nm_curso ASC";
  $consulta_cursos = $pdo->query($sql_cursos);
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
  <link rel="stylesheet" href="css/cursos.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Cursos</title>
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

  <div class="busca">
    <section class="container">
      <article class="texto-busca">
        <h1 class="titulo-1">Lista de Cursos</h1>
        <p class="paragrafo">Descruba mais sobre os cursos de Graduação.</p>
      </article>
      <article class="filtros-busca">
        <form method="GET" class="filtro row justify-content-around">
          <select class="form-select" id="pesquisa_curso" name="pesquisa_curso" required aria-label="Default select example">
            <option value="" hidden>Escolha o curso</option>
            <?php while($linha_curso = $consulta_cursos->fetch()){
              $cd_curso = $linha_curso[0];
              $nm_curso = $linha_curso[1]; 
            ?>

              <option value=<?php echo '"' . $nm_curso . '"' ?>> <?php echo $nm_curso?> </option>
              <?php }?>
          
          </select>
            
          <button class="btn" type="submit" id="btnPesquisar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button> 
        </form>  
      </article>
    </section>
  </div>

  <div class="cursos" id="cursos">
    <section class="container">
      <h2 class="titulo-2">Resultados:</h2>
      <p class="paragrafo">Clique em um curso para ver mais detalhes.</p>
      <article class="row">

      <?php 
        if(isset($_GET['pesquisa_curso'])){
          $pesquisa_curso = $_GET['pesquisa_curso'];
          $pesquisa_curso_db = "%" . $pesquisa_curso . "%";
          
          $sql_cursos = "SELECT * FROM curso WHERE nm_curso LIKE '$pesquisa_curso_db'";
          $consulta_cursos = $pdo->query($sql_cursos);

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

          <?php } ?>
        <?php } 
        else{
          $sql_cursos = "SELECT * FROM curso ORDER BY nm_curso ASC";
          $consulta_cursos = $pdo->query($sql_cursos);

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

          <?php } ?>
        <?php } ?>
        

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

</body>
</html>