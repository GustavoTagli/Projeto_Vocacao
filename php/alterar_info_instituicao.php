<?php
require('conexao.php');
session_start();
$email = $_SESSION['instituicao'][0];
$senha = $_SESSION['instituicao'][1];

$nome = $_POST['nome'];
$email = $_POST['email'];
$mec = $_POST['mec'];
$end = $_POST['end'];
$cep = $_POST['cep'];
$senha = $_POST['senha'];
$plano = $_POST['planos'];

$diretorio = "../img/upload/";

if(isset($_FILES['foto'])){
  $extensao = strtolower(substr($_FILES['foto']['name'], -4));
  if ($extensao == '.png' || $extensao== '.jpg' || $extensao== 'jpeg') {
    if ($extensao== 'jpeg') {
      $extensao = '.jpeg';
    }
    $novo_nome = md5(time()) . $extensao;
    
    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
    $inserir_foto = $pdo->prepare('UPDATE instituicao SET `ds_img_logo_instituicao` = "'.$novo_nome.'"  WHERE (ds_email="'.$email.'" and cd_senha="'.$senha.'")');
    $inserir_foto->execute();
  }
};

$sql_update = $pdo->prepare('UPDATE instituicao SET `nm_instituicao` = "'.$nome.'", `ds_email` = "'.$email.'", `cd_classificacao_mec` = "'.$mec.'", `ds_endereco` = "'.$end.'", `cd_senha` = "'.$senha.'", `ds_plano` = "'.$plano.'", `cd_cep` = "'.$cep.'"  WHERE (ds_email="'.$email.'" and cd_senha="'.$senha.'")');
$sql_update->execute();

header("location: ../informacoes_instituicao.php");

?>