<?php
require('conexao.php');

$cd_curso = $_POST['cd_curso'];
$cd_curso = intval($cd_curso);

$delete = $pdo->prepare('DELETE FROM curso_instituicao WHERE cd_curso = '.$cd_curso.'');
$delete->execute();

echo true;
?>