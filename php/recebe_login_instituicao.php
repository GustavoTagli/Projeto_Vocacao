<?php
require('conexao.php');

$email = addslashes($_POST['email']);
$senha = addslashes($_POST['senha']);

$stmt = $pdo->prepare('SELECT * FROM instituicao WHERE ds_email="'.$email.'" and cd_senha="'.$senha.'"');
$stmt->execute();

if(count($stmt->fetchAll(PDO::FETCH_ASSOC))>0){
    session_start();
    $_SESSION['instituicao'] = array($email,$senha);
    echo "true";
}else{
    echo "false";
}

?>