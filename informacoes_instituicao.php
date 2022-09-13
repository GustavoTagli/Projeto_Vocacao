<?php
require('php/conexao.php');
session_start();
if (!isset($_SESSION['instituicao'])) {
  header('location: parcerias.php');
}

$email_ = $_SESSION['instituicao'][0];
$senha_ = $_SESSION['instituicao'][1];

$sql = "SELECT * FROM instituicao WHERE ds_email='$email_' and cd_senha='$senha_'";
$consulta_sql = $pdo->query($sql);
while($linha=$consulta_sql->fetch()){
  $nome = $linha[1];
  $email = $linha[2];
  $mec = $linha[9];
  $end = $linha[8];
  $cep = $linha[4];
  $senha = $linha[3];
  $plano = $linha[10];
  $foto_sobre = $linha[13];
  $logo = $linha[12];
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
  <link rel="stylesheet" href="css/informacoes_instituicao.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer_instituicao.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Informações</title>
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
              <p class="avatar"><img id="avatar" src="img/upload/<?php echo $logo?>" alt="Prévia da Imagem"></p>
            </li>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="perfil_instituicao.php">Perfil</a></li>
              <li><a class="dropdown-item" href="php/sair.php">Sair</a></li>
            </ul>
          </div>
        </ul>
      </nav>
    </div>
  </header>
  
  <div class="informacoes">
    <section class="container">
      <h1 class="titulo-1">Informações</h1>
      <form class="form" method="POST" action="php/alterar_info_instituicao.php" enctype="multipart/form-data">
        <div class="display_form">
          <article class="informacoes_texto">
            <div class="mb-3 row">
              <label for="nome_instituicao" class="label col-form-label">Nome da Instituição:</label>
              <div class="input">
                <input type="text" class="form-control-plaintext" id="nome_instituicao" name="nome" value="<?php echo $nome?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="email" class="label col-form-label">Email:</label>
              <div class="input">
                <input type="email" class="form-control-plaintext" id="email" name="email" value="<?php echo $email?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="mec" class="label col-form-label">Nota Mec:</label>
              <div class="input">
                <input type="number" max="5" class="form-control-plaintext" name="mec" id="mec" value="<?php echo $mec?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="cep" class="label col-form-label">CEP</label>
              <div class="input">
                <input type="number" class="form-control-plaintext" id="cep" value="<?php echo $cep?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="rua_num" class="label end col-form-label">Endereço:</label>
              <div class="input">
                <input type="text"  class="form-control-plaintext" name="end" id="rua" value="<?php echo $end?>">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="senha" class="label col-form-label">Senha:</label>
              <div class="input">
                <input type="password" autocomplete="on" class="form-control-plaintext" id="senha" name="senha" value="<?php echo $senha?>">
              </div>
            </div>

            <div class="mb-3 row" style="margin-top: 20px;">
              <label for="planos" class="label col-form-label">Planos:</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="planos" id="plano_mensal" <?php if($plano=="mensal" || $plano=="Mensal") echo 'checked'?> value="Mensal">
                <label class="form-check-label" for="plano_mensal">
                  Mensal
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" required type="radio" name="planos" id="plano_semestral" <?php if($plano=="semestral" || $plano=="Semestral") echo 'checked'?> value="Semestral">
                <label class="form-check-label" for="plano_semestral">
                  Semestral
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" required type="radio" name="planos" id="plano_anual" <?php if($plano=="anual" || $plano=="Anual") echo 'checked'?> value="Anual">
                <label class="form-check-label" for="plano_anual">
                  Anual
                </label>
              </div>
            </div>
          </article>

          <article class="informacoes_foto column">
            <figure>
              <img id="foto_escolhida" src="img/upload/<?php echo $logo?>" alt="Prévia da Imagem">
            </figure>
            <div class="input-group upload_foto">
              <label name="uploadFoto" id="link_label" for="foto">Alterar Foto</label>
              <input style="display: none" type="file" class="form-control" accept=".png, .jpg, .jpeg" name="foto" id="foto">
            </div>
            <button type="submit" class="button">Salvar Alterações</button>
          </article>
        </div>
      </form>
    </section>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/header_footer.js"></script>

  <script>
    var foto;

    $(function(){
      $("#foto").change(function(event){
        foto = URL.createObjectURL(event.target.files[0]);
        $("#foto_escolhida").attr("src",foto);
        console.log(event);
      });
    });
  </script>
</body>
</html>