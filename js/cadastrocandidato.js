$('#form_cadastro_candidato').on('submit',function(e){
  e.preventDefault();
  var nome_candidato = $('#txt_nome').val();
  var email_candidato = $('#txt_email').val();

  if(nome_candidato == "" || email_candidato == ""){}
  else{
    $.ajax({
      method: "POST",
      url: "php/recebe_cadastro_candidato.php",
      data: {nome: nome_candidato , email: email_candidato}
    })
    .done(function()
    {		
      window.location = "teste_vocacional.php";
    })
    .fail(function(erro)
    {
      console.log(erro);
    })
  }
});