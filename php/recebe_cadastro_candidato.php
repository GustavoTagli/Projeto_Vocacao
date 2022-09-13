<?php   
  require("conexao.php");
  
  $nome_candidato = addslashes($_POST['nome']);
  $email_candidato = addslashes($_POST['email']);
  
  $cadastro = $pdo->prepare('INSERT INTO candidato (nm_candidato, ds_email) values ("'.$nome_candidato.'","'.$email_candidato.'")');
  $cadastro->execute();

  session_start();
  $_SESSION['Candidato'] = array($nome_candidato, $email_candidato);
?>