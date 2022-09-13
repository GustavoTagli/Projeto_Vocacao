<?php 
require("php/conexao.php");
session_start();
if (!isset($_SESSION['instituicao'])) {
  header('location: parcerias.php');
}

$email_ = $_SESSION['instituicao'][0];
$senha_ = $_SESSION['instituicao'][1];

$sql = "SELECT * FROM instituicao WHERE ds_email='$email_' and cd_senha='$senha_'";
$consulta_sql = $pdo->query($sql);
while($linha=$consulta_sql->fetch()){
  $logo = $linha[12];
}

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
  <link rel="stylesheet" href="css/cadastro_cursos.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer_instituicao.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Cadastro Cursos</title>
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
              <li><a class="dropdown-item" href="informacoes_instituicao.php">Editar Informações</a></li>
              <li><a class="dropdown-item" href="php/sair.php">Sair</a></li>
            </ul>
          </div>
        </ul>
      </nav>
    </div>
  </header>

  <div class="opcoes">
    <section class="container">
      <form id="form_cusos" method="POST">
        <article class="texto-curso">
          <h1 class="titulo-1">Cadastrar Novos Cursos</h1>
          <p class="paragrafo">Selecione os cursos que deseja adicionar:</p>
        </article>
        
        <article class="cursos d-flex row">

        <?php
        $cd_instituicao = $pdo->prepare("SELECT cd_instituicao FROM instituicao WHERE ds_email='$email_' and cd_senha='$senha_'");
        $cd_instituicao->execute();
        $cd_instituicao = $cd_instituicao->fetch(PDO::FETCH_COLUMN);
          
        while($linha_curso = $consulta_cursos->fetch()){
          $cd_curso = $linha_curso[0];
          $nm_curso = $linha_curso[1];
          $ds_img_logo_curso = $linha_curso[6];

          $cd_curso_instituicao = $pdo->prepare("SELECT cd_curso FROM curso_instituicao WHERE  cd_instituicao = $cd_instituicao and cd_curso=$cd_curso");
          $cd_curso_instituicao->execute();
          $cd_curso_instituicao = $cd_curso_instituicao->fetch(PDO::FETCH_COLUMN);

          if ($cd_curso != $cd_curso_instituicao) {
          ?>

          <div class="form-group form-check">
            <input type="checkbox" name="cursos" class="form-check-input" id="<?php echo $cd_curso?>">
            <label class="form-check-label" for="<?php echo $cd_curso?>"><?php echo $nm_curso. ''.$cd_curso_instituicao?></label>
          </div>

        <?php }} ?>
        </article>
        
        <button class="btn button" type="submit" id="cadastrar_cursos">Finalizar</button>
      </form>
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script type="text/javascript">
  $('#form_cusos').on('submit', function(e){
    e.preventDefault();
    var data = new Array();
    $('input:checkbox:checked').each(function(){
        data.push($(this).attr("id"));
    });

    $.ajax({
      method : 'POST',
      url : "php/recebe_cursos.php",
      data : {array: data}
    })
    .done(function(msg){
      // console.log(msg);
      window.location = "perfil_instituicao.php";
    })
    .fail(function(jqXHR, textStatus, msg){
        alert(msg);
    });
  })
  </script>

</body>
</html>