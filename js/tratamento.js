//tratamento de dados
$('#formulario').on('submit',function(e){
  e.preventDefault();
  $('#spinner').removeClass('visually-hidden');
  $('#pagination-container .disabled button').addClass("disabledbutton");
  $('.disabledbutton').css({opacity: '0.8'});
  var data = new Array();
  for(c=1; c<=numQuestoes; c++){
    var alternativa = $('input:radio[name='+c+']:checked').val();
    alternativa = parseInt(alternativa);
    data.push(alternativa);
    console.log(data);
  }
  
  $.ajax({
    method : 'POST',
    url : "php/recebe_teste.php",
    dataType: "json",
    data : {array: data}
  })
  .done(function(msg){
    // console.log(msg);
    window.location = "php/email.php";
  })
  .fail(function(jqXHR, textStatus, msg){
      alert(msg);
  });
})