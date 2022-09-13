var foto;

  $(function(){
    $("#foto").change(function(event){
      foto = URL.createObjectURL(event.target.files[0]);
      $("#foto_escolhida").attr("src",foto);
      console.log(event);
    });
  })

  $('svg[name="editar"]').on("click", function(){
    var for_editar = $(this).attr('for');
    $('#'+for_editar).removeAttr('disabled');
    $('#'+for_editar).css({'background-color': 'white', 'border-radius': '10px','color': 'black', 'padding-left': '5px', 'padding-right': '5px'});
    $('#'+for_editar).focus();

    if(for_editar == "senha"){
      $('#confirmar_senha').removeAttr('disabled');
      $('#confirmar_senha').css({'background-color': 'white', 'border-radius': '10px','color': 'black', 'padding-left': '5px', 'padding-right': '5px'});
    }
})