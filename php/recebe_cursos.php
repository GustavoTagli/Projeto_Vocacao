<?php
require('conexao.php');
session_start();

$email = $_SESSION['instituicao'][0];
$senha = $_SESSION['instituicao'][1];

$cd = $pdo->prepare('SELECT cd_instituicao FROM instituicao where(ds_email="'.$email.'" and cd_senha="'.$senha.'")');
$cd->execute();
$cd = $cd->fetch(PDO::FETCH_COLUMN);

$cursos = $_POST['array'];

for ($i=0; $i < count($cursos); $i++) { 
    $curso = intval($cursos[$i]);
    $sql = $pdo->prepare('INSERT INTO curso_instituicao (`cd_curso`, `cd_instituicao`) values ('.$curso.', '.$cd.')');
    $sql->execute();
}

echo true;
?>