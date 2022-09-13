<?php
require('conexao.php');
session_start();
$email = $_SESSION['instituicao'][0];
$senha = $_SESSION['instituicao'][1];

$nome = $_POST['nome'];
$ds = $_POST['descricao'];

$diretorio = "../img/upload/";

if(isset($_FILES['foto'])){
  $extensao = strtolower(substr($_FILES['foto']['name'], -4));
  if ($extensao == '.png' || $extensao== '.jpg' || $extensao== 'jpeg') {
    if ($extensao== 'jpeg') {
      $extensao = '.jpeg';
    }
    $novo_nome = md5(time()) . $extensao;
    
    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
    $inserir_foto = $pdo->prepare('UPDATE instituicao SET `ds_img_instituicao` = "'.$novo_nome.'"  WHERE (ds_email="'.$email.'" and cd_senha="'.$senha.'")');
    $inserir_foto->execute();
  }
}

  $sql_nome = $pdo->prepare('UPDATE instituicao SET `nm_instituicao` = "'.$nome.'"  WHERE (ds_email="'.$email.'" and cd_senha="'.$senha.'")');
  $sql_nome->execute();
  $sql_ds = $pdo->prepare('UPDATE instituicao SET `ds_instituicao` = "'.$ds.'"  WHERE (ds_email="'.$email.'" and cd_senha="'.$senha.'")');
  $sql_ds->execute();

  header("location: ../perfil_instituicao.php");
?>