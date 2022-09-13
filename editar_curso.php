<?php 
  require('php/conexao.php');
  session_start();
  if (!isset($_SESSION['instituicao'])) {
    header('location: parcerias.php');
  }
  
  $email = $_SESSION['instituicao'][0];
  $senha = $_SESSION['instituicao'][1];

  try{
    $id = $_GET['id'];
    $_SESSION['id_curso'] = $id;
    $sql_count_curso = $pdo->prepare("SELECT count(*) FROM curso");
    $sql_count_curso->execute();
    $count=$sql_count_curso->fetchAll(PDO::FETCH_COLUMN)[0];
    if ($id<=0 || $id>$count) {
      header('location: perfil_instituicao.php');
    }else{
      $sql_curso_instituicao = "SELECT * FROM curso_instituicao WHERE cd_curso = $id";
      $consulta_curso_instituicao = $pdo->query($sql_curso_instituicao);
      while($linha_curso_instituicao = $consulta_curso_instituicao->fetch()){
        $ds_curso = $linha_curso_instituicao[2];
        $qt_anos = $linha_curso_instituicao[3];
        $img_curso = $linha_curso_instituicao[4];
      }
      $sql_curso_geral = "SELECT * FROM curso WHERE cd_curso = $id";
      $consulta_curso_geral = $pdo->query($sql_curso_geral);
      while($linha_curso_geral = $consulta_curso_geral->fetch()){
        $nm_curso_geral = $linha_curso_geral[1];
        $ds_curso_geral = $linha_curso_geral[2];
        $formacao_curso_geral = $linha_curso_geral[3];
      }
      $sql_instituicao = "SELECT * FROM instituicao WHERE ds_email='$email' and cd_senha='$senha'";
      $consulta_instituicao = $pdo->query($sql_instituicao);
      while($linha_instituicao = $consulta_instituicao->fetch()){
        $nm_instituicao = $linha_instituicao[1];
        $logo_instituicao = $linha_instituicao[12];
      }
    }
  }
  catch (Exception $e){
    header('location: perfil_instituicao.php');
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
  <link rel="stylesheet" href="css/header_footer_instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/editar_curso.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Editar curso</title>
</head>
<body>
  <header id="header">  
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand navbar-alt">
          <figure style="margin-bottom: 0;">
            <img src="img/logo/logo_atual.png" alt="Logo Vocação">
          </figure>
        </div>
        <ul class="navbar-nav ms-auto">
          <div class="dropdown">
            <li class="nav-item" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <p class="avatar"><img id="avatar" src="img/upload/<?php echo $logo_instituicao?>" alt="Prévia da Imagem"></p>
            </li>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="perfil_instituicao.php">Perfil</a></li>
              <li><a class="dropdown-item" href="informacoes_instituicao.php">Editar Informações</a></li>
              <li><a class="dropdown-item" href="php/sair.php">Sair</a></li>
            </ul>
          </div>
        </ul>
      </nav>
    </div>
  </header>

  <form method="POST" action="php/alterar_info_curso.php" enctype="multipart/form-data">
    <div class="curso">
      <div class="container">
        <div class="cabecalho">
          <section>
            <h1 class="titulo-1"><?php echo $nm_curso_geral?></h1>
            <h5 class="titulo-5"><?php echo $nm_instituicao?></h5>
            <article class="info-curso">
              <h6 class="titulo-6">Área de Atuação</h6>
            <p class="paragrafo"><?php echo $formacao_curso_geral?></p>
            </article>

            <article class="info-curso duracao">
              <h6 class="titulo-6">Duração</h6>
              <input type="text" class="form-control paragrafo" name="duracao_curso" id="txt_duracao" value="<?php if($qt_anos != "") echo $qt_anos; else echo ''?>" placeholder="<?php if($qt_anos != "") echo $qt_anos; else echo 'Ex: 4 anos, 8 semestres...'?>">
            </article>
          </section>

          <section>
            <article class="foto-instituicao">
              <figure>
                <img id="foto_curso" src="<?php if($img_curso != "") echo 'img/upload/'.$img_curso; else echo 'img/foto_exemplo/foto_curso.png'?>" alt="">

                <label class="btn inserir_foto" for="foto">
                  <svg style="padding-bottom: .5vh" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                  Inserir Foto
                </label>
                <input style="display: none;" type="file" class="form-control" accept=".png, .jpg, .jpeg" name="foto" id="foto">
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

<textarea class="form-control" style="resize: none" name="ds_curso" id="txtarea_sobre">
<?php if($ds_curso != "") echo $ds_curso;
else echo $ds_curso_geral?>
</textarea>            
          </article>
        </section>
        <button type="submit" class="btn salvar_curso">Salvar Alterações</button>
      </div>
    </div>
  </form>
    

  <footer id="footer">
    <div class="container">
      <div class="row justify-content-around">
        <div class="item-footer">
          <div class="navbar-brand navbar-alt">
            <figure style="margin: 0">
              <img src="img/logo/logo_atual.png" alt="Logo Vocação">
            </figure>
          </div>
        </div>
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

  <script>
    $(function(){
      $("#foto").change(function(event){
        var x = URL.createObjectURL(event.target.files[0]);
        $("#foto_curso").attr("src",x);
        console.log(event);
      });
    });
  </script>

</body>
</html>