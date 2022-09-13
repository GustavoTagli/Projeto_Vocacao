<?php
require('conexao.php');

if (isset($_POST['curso'])) {
    $nm_curso = $_POST['curso'];
    $nomes_instituicao = array();
    $cidades_instituicao = array();
    
    if ($nm_curso == "todos") {
        $curso = "SELECT * FROM curso";
        $consulta_curso = $pdo->query($curso);
        while($linha_curso = $consulta_curso->fetch()){
            $cd_curso = $linha_curso[0];

            $ci = "SELECT * FROM curso_instituicao where cd_curso=$cd_curso";
            $consulta_ci = $pdo->query($ci);
            while($linha_ci = $consulta_ci->fetch()){
                $cd_instituicao = $linha_ci[1];
                
                $instituicao = "SELECT * FROM instituicao where cd_instituicao=$cd_instituicao";
                $consulta_instituicao = $pdo->query($instituicao);
                while($linha_instituicao = $consulta_instituicao->fetch()){
                    $nm_instituicao = $linha_instituicao[1];

                }
                $sql_cidade = "SELECT nm_cidade FROM instituicao where cd_instituicao=$cd_instituicao";
                $consulta_cidade = $pdo->query($sql_cidade);
                while($linha_cidade = $consulta_cidade->fetch()){
                    $cidade = $linha_cidade[0];
                    array_push($cidades_instituicao, $cidade);
                }
                $cidades_instituicao = array_unique($cidades_instituicao);
            }
        }
    }
    else{
        $cd_curso = $pdo->prepare("SELECT cd_curso FROM curso WHERE nm_curso= '$nm_curso'");
        $cd_curso->execute();
        $cd_curso = $cd_curso->fetch(PDO::FETCH_COLUMN);
    }
    $ci = "SELECT * FROM curso_instituicao where cd_curso=$cd_curso";
    $consulta_ci = $pdo->query($ci);
    while($linha_ci = $consulta_ci->fetch()){
        $cd_instituicao = $linha_ci[1];
        
        $instituicao = "SELECT * FROM instituicao where cd_instituicao=$cd_instituicao";
        $consulta_instituicao = $pdo->query($instituicao);
        while($linha_instituicao = $consulta_instituicao->fetch()){
            $nm_instituicao = $linha_instituicao[1];

        }
        $sql_cidade = "SELECT nm_cidade FROM instituicao where cd_instituicao=$cd_instituicao";
        $consulta_cidade = $pdo->query($sql_cidade);
        while($linha_cidade = $consulta_cidade->fetch()){
            $cidade = $linha_cidade[0];
            array_push($cidades_instituicao, $cidade);
        }
        $cidades_instituicao = array_unique($cidades_instituicao);
    }
    
    echo json_encode($cidades_instituicao, JSON_UNESCAPED_UNICODE);
}


if (isset($_POST['cidade'])) {
    $nm_cidade = $_POST['cidade'];
    $nomes_instituicao = array();
    $cursos_instituicao = array();
    
    $instituicao = "SELECT * FROM instituicao where nm_cidade='$nm_cidade'";
    $consulta_instituicao = $pdo->query($instituicao);
    while($linha_instituicao = $consulta_instituicao->fetch()){
        $cd_instituicao = $linha_instituicao[0];
        $nm_instituicao = $linha_instituicao[1];
        array_push($nomes_instituicao, $nm_instituicao);
    }
    echo json_encode($nomes_instituicao, JSON_UNESCAPED_UNICODE);
}
?>