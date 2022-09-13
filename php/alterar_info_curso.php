<?php
require('conexao.php');
session_start();

$duracao_curso = $_POST['duracao_curso'];
$ds_curso = $_POST['ds_curso'];

if ($duracao_curso == "") {
    $update = $pdo->prepare('UPDATE curso_instituicao SET `ds_curso` = "'.$ds_curso.'", `qt_anos_duracao_curso` = null  WHERE cd_curso='.$_SESSION['id_curso'].'');
    $update->execute();
}
else{
    $update = $pdo->prepare('UPDATE curso_instituicao SET `ds_curso` = "'.$ds_curso.'", `qt_anos_duracao_curso` = "'.$duracao_curso.'"  WHERE cd_curso='.$_SESSION['id_curso'].'');
    $update->execute();
}

$diretorio = "../img/upload/";

if(isset($_FILES['foto'])){
  $extensao = strtolower(substr($_FILES['foto']['name'], -4));
  if ($extensao == '.png' || $extensao== '.jpg' || $extensao== 'jpeg') {
    if ($extensao== 'jpeg') {
      $extensao = '.jpeg';
    }
    $novo_nome = md5(time()) . $extensao;
    
    move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
    $inserir_foto = $pdo->prepare('UPDATE curso_instituicao SET `ds_img_detalhes_curso` = "'.$novo_nome.'"  WHERE cd_curso='.$_SESSION['id_curso'].'');
    $inserir_foto->execute();
  }
}

header('location: ../editar_curso.php?id='.$_SESSION['id_curso'].'')
?>