<?php
require_once("conexao.php");

session_start();
  if((isset($_SESSION["result"]) == ""))
  {
    header("location: ../index.php");
	exit();
  }
session_abort();

if (isset($_SESSION["vindo_do_resultado"])) {
	header("location: ../resultado_teste.php");
	exit();
}

$nome = $pdo->query('SELECT nm_candidato FROM candidato where cd_candidato= (select max(cd_candidato) from candidato)');
$nome = $nome->fetchAll(PDO::FETCH_COLUMN)[0];
$email = $pdo->query('SELECT ds_email FROM candidato where cd_candidato= (select max(cd_candidato) from candidato)');
$email = $email->fetchAll(PDO::FETCH_COLUMN)[0];

session_start();
$cd_area = $_SESSION['result'];
$corpo = "";
$area = "";
for ($i=0; $i < count($cd_area) ; $i++) { 
	$ds = $pdo->prepare("SELECT ds_area_atuacao FROM area_atuacao WHERE cd_area_atuacao= $cd_area[$i]+1");
	$ds->execute();
	$nm = $pdo->prepare("SELECT nm_area_atuacao FROM area_atuacao WHERE cd_area_atuacao= $cd_area[$i]+1");
	$nm->execute();

	$ds = $ds->fetchAll(PDO::FETCH_COLUMN);
	$ds = json_encode($ds, JSON_UNESCAPED_UNICODE);
	$ds = str_replace(array('"','[',']'), '',$ds);

	$nm = $nm->fetchAll(PDO::FETCH_COLUMN);
	$nm = json_encode($nm, JSON_UNESCAPED_UNICODE);
	$nm = str_replace(array('"','[',']'), '',$nm);

	$area = "".$nm.";";

	$corpo = "<p>".$corpo." ".$nm.": ".$ds."</p>";
}


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

$mail->addAddress($email);

$mail->isHTML(true);
$mail->Subject = utf8_decode(''.$nome.', seu resultado do Teste Vocacional!');
$mail->Body = utf8_decode($corpo);
$mail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	 )
	);

unset( $_SESSION["vindo_do_resultado"] );
header("location: ../resultado_teste.php");

$mail->send();

// criando relatório pra Instituição
$relatorio = fopen('relatorio.txt','a');
$info = "".$nome." - ".$email." - ".$area."\n";
fwrite($relatorio, $info);
fclose($relatorio);

for ($linhas = -1, $arq = fopen('relatorio.txt', 'r'); !feof($arq); $linhas++){
	fgets( $arq );
}
fclose( $arq);

// enviando relatório para Instituição,
// SE houver 30 resultados


	if ($linhas==30) {
		$mailf = new PHPMailer(true);

		$mailf->SMTPDebug = SMTP::DEBUG_SERVER;
		$mailf->isSMTP();
		$mailf->Host = 'smtp.gmail.com';
		$mailf->SMTPAuth = true;
		$mailf->Username = 'vocacaotcc@gmail.com';
		$mailf->Password = 'vocacao@TCC1';
		$mailf->Port = 587;

		$mailf->setFrom('vocacaotcc@gmail.com', utf8_decode("Vocação"));

		$sql_instituicao = "SELECT * FROM instituicao";
		$consulta_instituicao = $pdo->query($sql_instituicao);
		while($linha_instituicao = $consulta_instituicao->fetch()){
		$email_instituicao = $linha_instituicao[2];
		$mailf->addAddress($email_instituicao);
		}
		
		$mailf->isHTML(true);
		$mailf->Subject = utf8_decode('Relatório');
		$mailf->Body = utf8_decode('Esses foram os candidatos que participaram do nosso teste.');
		$mailf->AddAttachment('relatorio.txt');
		$mailf->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
			);
		$mailf->send();

		unlink('relatorio.txt');
	}
?>