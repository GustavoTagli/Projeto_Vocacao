<?php
require("conexao.php");

$dados = $_POST['dados'];
$dados['cnpj'] = str_replace(array( '/','-', '.' ),'',$dados['cnpj']);
$dados['cep'] = str_replace(array('[',']', '"','-'),'',$dados['cep']);

$stmt = $pdo->prepare('INSERT INTO instituicao values (null,"'.$dados["nome"].'", "'.$dados["email"].'", "'.$dados["senha"].'", "'.$dados["cep"].'", "'.$dados["cidade"].'","'.$dados["uf"].'", "'.$dados["cnpj"].'", "'.$dados["end"].'", "'.$dados["mec"].'", "'.$dados["plano"].'", null, null, null)');
$stmt->execute();

require('src/PHPMailer.php');
require('src/SMTP.php');
require('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'vocacaotcc@gmail.com';
$mail->Password = 'vocacao@TCC1';
$mail->Port = 587;
$mail->setFrom('vocacaotcc@gmail.com', utf8_decode("Vocação"));

$mail->addAddress($dados['email']);

$mail->isHTML(true);
$mail->Subject = utf8_decode('Olá, '.$dados['nome'].'! Falta pouco para concluir o seu cadastro.');
$mail->AddEmbeddedImage('../img/logo/AssEmail.png', 'logo_ref');
$mail->Body = utf8_decode("<p>Agradecemos pela preferência. Garantimos que nossa parceria será bem sucedida.</p><p><strong>Para finalizar o cadastro, clique no link abaixo:</strong><br><a href='<a'>Realizar pagamento</a></p><figure><img style='width: 300px; height: 100px' src='cid:logo_ref'></figure>");
$mail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	 )
	);

if($mail->send()){
  echo true;
}else{
  echo false;
};

?>