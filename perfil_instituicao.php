<?php
require('php/conexao.php');
session_start();
if (!isset($_SESSION['instituicao'])) {
  header('location: parcerias.php');
}

$email = $_SESSION['instituicao'][0];
$senha = $_SESSION['instituicao'][1];

$sql_foto = $pdo->prepare("SELECT ds_img_logo_instituicao FROM instituicao WHERE ds_email='$email' and cd_senha='$senha'");
$sql_foto->execute();
$sql_foto = $sql_foto->fetch(PDO::FETCH_COLUMN);

$diretorio = "img/upload/";

if(isset($_FILES['primeira_foto'])){
  $extensao = strtolower(substr($_FILES['primeira_foto']['name'], -4));
  if ($extensao== 'jpeg') {
    $extensao = '.jpeg';
  }
  $novo_nome = md5(time()) . $extensao;

  move_uploaded_file($_FILES['primeira_foto']['tmp_name'], $diretorio.$novo_nome);

  $inserir_foto = $pdo->prepare('UPDATE instituicao SET `ds_img_logo_instituicao` = "'.$novo_nome.'"  WHERE (ds_email="'.$email.'" and cd_senha="'.$senha.'")');
  $inserir_foto->execute();

  $sql_foto = $pdo->prepare("SELECT ds_img_logo_instituicao FROM instituicao WHERE ds_email='$email' and cd_senha='$senha'");
  $sql_foto->execute();
  $sql_foto = $sql_foto->fetch(PDO::FETCH_COLUMN);
}

$sql = "SELECT * FROM instituicao WHERE ds_email='$email' and cd_senha='$senha'";
$consulta_sql = $pdo->query($sql);
while($linha=$consulta_sql->fetch()){
  $nome = $linha[1];
  $foto_sobre = $linha[13];
  $ds = $linha[11];
  $cep = $linha[4];
  $cidade = $linha[5];
  $uf = $linha[6];
  $rua_num = $linha[8];
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
  <link rel="stylesheet" href="css/perfil_instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/modal_foto_instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer_instituicao.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Perfil</title>
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
              <p class="avatar"><img id="avatar" src="<?php if(isset($sql_foto))echo $diretorio.$sql_foto; else echo 'img/foto_exemplo/foto_perfil.png'?>" alt="Prévia da Imagem"></p>
            </li>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="informacoes_instituicao.php">Editar Informações</a></li>
              <li><a class="dropdown-item" href="php/sair.php">Sair</a></li>
            </ul>
          </div>
        </ul>
      </nav>
    </div>
  </header>

  <?php
    if ($sql_foto=="null" || $sql_foto=="") {
      ?>
  <form class="form_primeira_foto" id='form_primeria_foto' method="post" action="perfil_instituicao.php" enctype="multipart/form-data">
    <button id="btn_modal" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verificacao_foto" style="display: none;"></button>
    <div class="modal modal_foto fade" id="verificacao_foto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="titulo-3">Parece que é o seu primeiro acesso, coloque o logo da sua Instituição aqui:</h3>
          </div>
          <div class="modal-body">
              <article class="primeira_foto_instituicao">
                <figure>
                  <img id="primeira_foto_perfil" src="img/foto_exemplo/foto_perfil.png" alt="">
                </figure>
                <label class="btn primeiro_inserir_foto " for="primeira_foto">
                  <input style="display: none;" type="file" class="form-control" accept=".png, .jpg, .jpeg" name="primeira_foto" id="primeira_foto" required>
                  <svg style="padding-bottom: .5vh" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
                </label>
              </article>
              <button id="btn_ok" type="submit" class="btn botao_ok disabledbutton">Ok</button>
            </div>
        </div>
      </div>
    </div>
  </form>
  <?php
  }
  ?>

  <div class="instituicao">
    <div class="container">
      <form method="POST" action="php/mudar_dados_perfil.php" enctype="multipart/form-data">
        <section>
          <input type="text" class="form-control titulo-1" name="nome"id="txt_nome" value="<?php if(isset($sql_foto)) echo $nome;  else echo'';?>" required>
          <article class="foto-instituicao">
            <figure>
              <img id="foto_sobre" src="<?php if(isset($foto_sobre)) echo $diretorio . $foto_sobre; else echo 'img/foto_exemplo/foto_sobre.png';?>" alt="">
            </figure>

            <p class="paragrafo end">End: <?php echo $rua_num . ". " . $cidade . "/" . $uf . ". CEP: " . $cep?></p>

            <label class="btn inserir_foto" for="foto">
            <svg style="padding-bottom: .5vh" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            Inserir Foto
            </label>
            <input style="display: none;" type="file" class="form-control" accept=".png, .jpg, .jpeg" name="foto" id="foto">
            
          </article>
          <article class="texto-instituicao">
            <h2 class="titulo-2">Sobre a instituição</h2>
            
<textarea class="form-control" style="resize: none" id="txtarea_sobre" name="descricao" placeholder="Coloque aqui uma breve descrição de sua Instituição" required>
<?php if($ds!="" || $ds!="null") echo $ds?>
</textarea>

          </article>
        </section>
        <button type="submit" class="btn salvar">Salvar Alterações</button>
      </form>
    </div>
  </div>

  <div class="cursos-instituicao">
    <div class="container">
      <h2 class="titulo-2">Cursos - <?php if(isset($sql_foto)) echo $nome;  else echo'';?></h2>
      <p class="paragrafo">Clique em um curso para ver mais detalhes.</p>
      <section class="cursos">
        <article class="row">

          <a href="cadastro_cursos.php">
            <div class="card">
              <img src="img/perfil_instituicao/adicionar_curso.png" class="card-img-top" alt="">
            </div>
          </a>

        <?php
        $cd = $pdo->prepare('SELECT cd_instituicao FROM instituicao where(ds_email="'.$email.'" and cd_senha="'.$senha.'")');
        $cd->execute();
        $cd = $cd->fetch(PDO::FETCH_COLUMN);

        $sql_cd_cursos = "SELECT * FROM curso_instituicao WHERE cd_instituicao='$cd'";
        $consulta_cd_cursos = $pdo->query($sql_cd_cursos);
        while($linha=$consulta_cd_cursos->fetch()){
          $cd_curso = $linha[0];
          $sql_cursos = "SELECT * FROM curso WHERE cd_curso='$cd_curso'";
          $consulta_cursos = $pdo->query($sql_cursos);
          while($linha_curso = $consulta_cursos->fetch()){
            $logo_curso = $linha_curso[6];
          ?>
          <div class="card">

            <label for="<?php echo $cd_curso?>_">
            <input style="display: none;" type="button" class="form-control" name="excluir" id="<?php echo $cd_curso?>_" required>
              <span role="button" class="position-absolute excluir_curso translate-middle badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#215273" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
              </span>
            </label>

            <img src="<?php echo $logo_curso?>" class="card-img-top" alt="">
            <label for="<?php echo $cd_curso?>">
              <input style="display: none;" type="button" class="form-control" name="editar" id="<?php echo $cd_curso?>" required>
              <span role="button" class="position-absolute editar_curso translate-middle badge">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-pencil" viewBox="0 0 16 16">
                  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                </svg>
              </span>
            </label>

          </div>

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
      var foto;
      $('#btn_modal').click();
      $("#primeira_foto").change(function(event){
        foto = URL.createObjectURL(event.target.files[0]);
        $("#primeira_foto_perfil").attr("src",foto);
        $('#btn_ok').removeClass("disabledbutton"); 
        console.log(event);
      });
      $("#foto").change(function(event){
        foto = URL.createObjectURL(event.target.files[0]);
        $("#foto_sobre").attr("src",foto);
        console.log(event);
      });
    })
    $('input:button[name=editar]').on('click', function(){
      window.location = "editar_curso.php?id="+ $(this).attr('id') +"";
    })
    $('input:button[name=excluir]').on('click', function(){
      var cd = $(this).attr('id').replace('_', '');
      $.ajax({
        method : 'POST',
        url : "php/excluir_curso.php",
        data : {cd_curso: cd}
      })
      .done(function(msg){
        window.location = "perfil_instituicao.php";
      })
      .fail(function(jqXHR, textStatus, msg){
          alert(msg);
      });
    })
  </script>

</body>
</html>