<?php 
  header('Content-Type: application/json');   
  require_once("conexao.php");
  
  $cd_alternativas = $_POST['array'];
  
  $txt = "cd_alternativa= ";
  $alternativas = $txt . $cd_alternativas[0];
  for ($i=1; $i < count($cd_alternativas) ; $i++) { 
     $alternativa = $txt . $cd_alternativas[$i] . " ";
     $alternativas =  $alternativas . " or " . $alternativa;
  }
      
  $qtArea = $pdo->prepare('SELECT count(*) FROM area_atuacao');
  $qtArea->execute();
  $qtArea = intval($qtArea->fetch(PDO::FETCH_COLUMN));

  $total = array();

  for ($i=1; $i <=$qtArea ; $i++) { 
    $stmt = $pdo->prepare('SELECT count(cd_area_atuacao) FROM alternativa WHERE ('.$alternativas.') and cd_area_atuacao='.$i.'');
    $stmt->execute();
    $stmt = intval($stmt->fetchAll(PDO::FETCH_COLUMN)[0]);
    array_push($total, $stmt);
  }


  session_start();
  $dup = array_unique( array_diff_assoc( $total, array_unique( $total )));
  
  if(count($dup)>1){
    $dup = max($dup);
    $dup = array_keys($total, $dup);
    $_SESSION["result"] = $dup;
    echo json_encode($_SESSION["result"]);
  }else{
    $maior = max($total);
    $area = array_keys($total, $maior);
    $area = $area[0];
    $_SESSION["result"] = array($area);
    echo json_encode($_SESSION["result"]);
  }
?>