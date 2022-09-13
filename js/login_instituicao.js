// Login
$('#form_login').on('submit', function(event){
    event.preventDefault();
    var email = $('#email_login').val();
    var senha =  $('#senha_login').val();
  
    $.ajax({
      method : 'POST',
      url : "php/recebe_login_instituicao.php",
      data : {email: email, senha: senha}
    })
    .done(function(msg){
      if(msg=="false"){
        $('#invalido').fadeIn(200);
        $('#invalido').removeClass('disabled');
        setTimeout(function(){
          $('#invalido').fadeOut(200);
          $('#invalido').addClass('disabled');
        }, 4000);
      }
      else{
        window.location = "perfil_instituicao.php";
      }
    })
    .fail(function(jqXHR, textStatus, msg){
      alert(msg);
    });
  })