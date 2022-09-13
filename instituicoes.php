<?php 
  require("php/conexao.php");

  $sql_instituicao = "SELECT * FROM instituicao ORDER BY cd_classificacao_mec DESC";
  $consulta_instituicao = $pdo->query($sql_instituicao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="css/instituicoes.css" type="text/css">
  <link rel="stylesheet" href="css/header_footer.css" type="text/css">
  <link rel="sortcut icon" href="img/logo/favicon-32x32.png">
  <title>Vocação - Instituições</title>
</head>
<body>
  <header id="header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="navbar-brand navbar-alt">
          <a href="index.php">
            <figure style="margin-bottom: 0;">
              <img src="img/logo/logo_atual.png" alt="Logo Vocação">
            </figure>
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">  
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="teste.php">Teste Vocacional</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cursos.php">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="instituicoes.php">Instituições de Ensino</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parcerias.php">Parcerias</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <div class="busca">
    <div class="container">
      <section>
        <article class="texto-busca">
          <h1 class="titulo-1">Instituições de Ensino</h1>
          <p class="paragrafo">Encontre a universidade ideal para cursar!</p>
        </article>
        <article>
          <form method="GET" class="filtros-busca row">
            <div class="filtro">
              <label for="curso" class="form-label">Qual curso pretende estudar?</label>
              <select name="curso" class="form-select" id="curso">
                <option value="" hidden>Curso</option>
                <option value="todos" >Todas os Cursos</option>
                <?php
                $sql_cursos = "SELECT * FROM curso ORDER BY nm_curso ASC";
                $consulta_cursos = $pdo->query($sql_cursos);
                while($linha_curso = $consulta_cursos->fetch()){
                  $cd_curso = $linha_curso[0];
                  $nm_curso = $linha_curso[1];

                  $sql_ci = "SELECT distinct cd_curso FROM curso_instituicao where cd_curso = $cd_curso";
                  $consulta_ci = $pdo->query($sql_ci);
                  while($linha_ci = $consulta_ci->fetch()){
                    $cd_curso_ci = $linha_ci[0];

                    if ($cd_curso == $cd_curso_ci) {
                ?>

                  <option value=<?php echo '"' . $nm_curso . '"' ?>> <?php echo $nm_curso?> </option>
                <?php }}}?>
            </select>

            </div>
            <div class="filtro">
              <label for="cidade" class="form-label">Qual cidade gostaria de estudar?</label>
              <select name="cidade" class="form-select disabled" id="curso">
                <option value="" hidden>Cidade</option>
                <option value="todos" >Todas as Cidades</option>
                <?php
                $insti = "SELECT distinct nm_cidade FROM instituicao ORDER BY nm_cidade ASC";
                $consulta_insti = $pdo->query($insti);
                  while($linha_insti = $consulta_insti->fetch()){
                    $cidade_insti = $linha_insti[0];
                ?>

                  <option value=<?php echo'"' . $cidade_insti . '"' ?>> <?php echo $cidade_insti ?> </option>
                <?php }?>
              </select>
            </div>
            <div class="filtro">
              <label for="universidade" class="form-label">Qual Universidade prefere?</label>
              <select name="instituicao" class="form-select disabled" id="curso">
                <option value="" hidden>Instituição</option>
                <option value="todos" >Todas as Instituições</option>
                <?php
                $institui = "SELECT * FROM instituicao ORDER BY nm_instituicao ASC";
                $consulta_institui = $pdo->query($institui);
                while($linha_institui = $consulta_institui->fetch()){
                  $cd_institui = $linha_institui[0];
                  $nm_institui = $linha_institui[1];

                  $sql_ci_ = "SELECT distinct cd_instituicao FROM curso_instituicao where cd_instituicao = $cd_institui";
                  $consulta_ci_ = $pdo->query($sql_ci_);
                  while($linha_ci_ = $consulta_ci_->fetch()){
                    $cd_institui_ci = $linha_ci_[0];

                  if ($cd_institui == $cd_institui_ci) {
                ?>

                  <option value=<?php echo'"' . $nm_institui . '"' ?>> <?php echo $nm_institui?> </option>
                <?php }}}?>
            </select>
            </div>
            <div class="pesquisa">
              <button class="btn" type="submit" id="btnPesquisar">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </button>
            </div> 
          </form> 
        </article>
      </section>
    </div>
  </div>

  <section class="opcoes">
    <div class="container">
      <h2 class="titulo-2">Algumas opções:</h2>
      <p class="paragrafo">Clique em uma instituição para ver mais detalhes.</p>
      <?php
      while($linha = $consulta_instituicao->fetch()){
        $cd_instituicao = $linha[0];
        $nm_instituicao = $linha[1];
        $ds_instituicao = $linha[11];
        $mec_instituicao = $linha[9];
        $cidade_instituicao = $linha[5];
        $uf_instituicao = $linha[6];
        $foto_sobre = $linha[13];
        if ($ds_instituicao=="") {
        }else{
      ?>
        <a class="card_instituicao" href="instituicao.php?cd=<?php echo $cd_instituicao?>">
          <div class="card">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php if(isset($foto_sobre)) echo 'img/upload/' . $foto_sobre;?>" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="titulo-5"><?php echo $nm_instituicao?></h5>
                  <p class="card-text" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; "><?php echo $ds_instituicao?></p>
                  <p class="card-text">
                    Nota Mec:
                    <?php 
                    for($i=1; $i<=intval($mec_instituicao); $i++){
                      ?>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 18">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                      </svg>
                      <?php
                      }
                      ?>
                    (<?php echo $mec_instituicao ?>/5)
                  </p>
                  <p class="card-text"><?php echo $cidade_instituicao?>, <?php echo $uf_instituicao?></p>
                </div>
              </div>
            </div>
          </div>
        </a>
        <?php }} ?>
        
        <div id="pagination-container" class="simple-pagination"></div>
      
      </div>
    </section>

    <footer id="footer">
    <div class="container">
      <div class="row justify-content-around">
        <div class="item-footer">
          <div class="navbar-brand navbar-alt">
            <a href="index.php">
              <figure style="margin: 0">
                <img src="img/logo/logo_atual.png" alt="Logo Vocação">
              </figure>
            </a>
          </div>
        </div>
        <nav class="item-footer navbar navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="cursos.php">Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teste.php">Teste Vocacional</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="instituicoes.php">Instituições de Ensino</a>
            </li>
          </ul>
        </nav>
        <nav class="item-footer navbar navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="planos.php">Planos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parcerias.php">Parcerias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastro_instituicao.php">Cadastro</a>
            </li>
          </ul>
        </nav>
        <div class="item-footer">
          <h6 class="titulo-6">Fale Conosco</h6>
          <p class="p-footer">(13) 99999-9999</p>
          <p class="p-footer">vocacao@gmail.com</p>
        </div>
        <div class="item-footer">
          <div class="redes-sociais me-auto ms-auto">
            <figure>
              <a href=""><img src="img/redes_sociais/Facebook.png" alt=""></a>
            </figure>
            <figure>
              <a href=""><img src="img/redes_sociais/Instagram.png" alt=""></a>
            </figure>
            <figure>
              <a href=""><img src="img/redes_sociais/Twitter.png" alt=""></a>
            </figure>
            <figure>
              <a href=""><img src="img/redes_sociais/Youtube.png" alt=""></a>
            </figure>
          </div>
          <div class="copy-right">
            <p class="p-footer">© 2021 Vocação - Todos os direitos reservados</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>
  <script type="text/javascript" src="js/paginacao_instituicoes.js"></script>
  <script type="text/javascript" src="js/header_footer.js"></script>

  <script>
    $('select[name = curso]').on('change', function(){
      var curso = $(this).val();
      
      $.ajax({
        method : 'POST',
        url : "php/recebe_pesquisa_instituicao.php",
        dataType: "json",
        data : {curso: curso}
      })
      .done(function(msg){
        console.log(msg);
        $('select[name = cidade] option:not(:selected)').remove();
        for(var i=0; i<msg.length; i++){
          $('select[name = cidade]').append('<option>' + msg[i] + '</option>');
        }
        $('select[name = cidade]').removeClass('disabled');
      })
      .fail(function(jqXHR, textStatus, msg){
        alert(msg);
      });
    })


    $('select[name = cidade]').on('change', function(){
      var cidade = $(this).val();

      $.ajax({
        method : 'POST',
        url : "php/recebe_pesquisa_instituicao.php",
        dataType: "json",
        data : {cidade: cidade}
      })
      .done(function(msg){
        console.log(msg);
        $('select[name = instituicao] option:not(:selected)').remove();
        for(var i=0; i<msg.length; i++){
          $('select[name = instituicao]').append('<option>' + msg[i] + '</option>');
        }
        $('select[name = instituicao]').removeClass('disabled');
      })
      .fail(function(jqXHR, textStatus, msg){
        alert(msg);
      });
    })

    // $('select[name = instituicao]').on('change', function(){
    //   var instituicao = $(this).val();

    //   if ($('select[name = curso]').val()=="" || $('select[name = cidade]').val() =="") {
    //     $.ajax({
    //       method : 'POST',
    //       url : "php/recebe_pesquisa_instituicao.php",
    //       dataType: "json",
    //       data : {instituicao: instituicao}
    //     })
    //     .done(function(msg){
    //       console.log(msg);
    //       $('select[name = curso] option:not(:selected)').remove();
    //       for(var i=0; i<msg[0].length; i++){
    //         $('select[name = curso]').append('<option>' + msg[0][i] + '</option>');
    //       }
    //       $('select[name = cidade] option:not(:selected)').remove();
    //       for(var i=0; i<msg[1].length; i++){
    //         $('select[name = cidade]').append('<option>' + msg[1][i] + '</option>');
    //       }
    //     })
    //     .fail(function(jqXHR, textStatus, msg){
    //       alert(msg);
    //     });
    //   }
    // })

  </script>

</body>
</html>