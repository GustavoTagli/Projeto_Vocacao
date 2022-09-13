// Declaração de variaveis mais utilizadas
var nome = $('#txt_nome');
var endereco = $('#txt_endereco');
var num = $('#txt_num');
var email = $('#txt_email');
var senha = $('#txt_senha');
var conf_senha = $('#txt_conf_senha');
var mec = $('#mec');
var Cnpj = $('#txt_cnpj');
var Cep = $('#txt_cep');
var all = $('#txt_nome, #txt_endereco, #txt_num, #txt_email, #txt_senha, #txt_conf_senha, #txt_cnpj, #txt_cep, #mec');
var plano;
var cidade;
var uf;
// Mask do cnpj e cep, e verificação de campos vazios no form
$(function(){ 
  $("#txt_cep").mask('00000-000');
  $("#txt_cnpj").mask('00.000.000/0000-00');
  $("#txt_num").mask('00000');
  $("#mec").mask('0');
  
  $(all).on('input', function(){
    if(nome.val().length > 0 && endereco.val().length > 0 && num.val().length > 0 && email.val().length > 0 && senha.val().length > 0 && conf_senha.val().length > 0 && Cnpj.val().length == 18 && Cep.val().length == 9 && mec.val().length > 0){
      $("#btn_cadastrar").removeClass("disabledbutton");
    }
    else{
      $("#btn_cadastrar").addClass("disabledbutton");
    }
  })
})

// Checado? libera o botão
$('input:radio[name=planos]').on('change', function(){
  $('#Step2').removeClass('disabledForm');
  plano = $('input:radio[name=planos]:checked').attr('id');
});

// Validação CEP
$(Cep).on('input', function isValidCep(cep){
  var CEP = $('#txt_cep').val();
  cep = CEP.replace(/[^\d]+/g, '');
  if(cep.length == 8){
    $.getJSON('https://viacep.com.br/ws/' + cep + '/json/', function(end){
      if(!end.erro){
        $('#txt_cep').css({"box-shadow": "0px 0px 10px 3px #1C5995"});
        var rua = end.logradouro;
        cidade = end.localidade;
        uf = end.uf;
        $('#txt_endereco').val(rua);
        $('#txt_cep').attr('value', 'true');
      }else{
        $('#txt_cep').attr('value', 'false');
      }
    });
  }
})
  
// Subimt cadastro
$('#form_cadastro').on('submit', function(event){
  event.preventDefault();

  // Confirmar senha
  if (senha.val() == conf_senha.val()) {
    $('#txt_conf_senha').focus().css({"box-shadow": "0px 0px 8px 3px #1C5995"});
    setTimeout(function(){
      $('#txt_conf_Senha').css({"box-shadow": "none"});
    }, 3500);
    validoSenha = "true";
  }else{
    $('#txt_conf_senha').focus().css({"border": "3px solid #E12E1E"}).val("Oops...Verifique a senha novamente").attr('type','text').attr('readonly', 'true');
    setTimeout(function(){
      $('#txt_conf_senha').css({"border": "2px solid transparent"}).val("").attr('type','password').removeAttr('readonly', 'false');
    }, 3200);
    validoSenha = "false";
  }

  // Validação CNPJ
  var CNPJ = $("#txt_cnpj").val();
  function isValidCnpj(cnpj){
    cnpj = CNPJ.replace(/[^\d]+/g, '');
  
    if (cnpj === '') return false;
    
    if (cnpj.length !== 14) return false;
  
    if (
      cnpj === '00000000000000' ||
      cnpj === '11111111111111' ||
      cnpj === '22222222222222' ||
      cnpj === '33333333333333' ||
      cnpj === '44444444444444' ||
      cnpj === '55555555555555' ||
      cnpj === '66666666666666' ||
      cnpj === '77777777777777' ||
      cnpj === '88888888888888' ||
      cnpj === '99999999999999'
    ) {
      return false;
    }
  
    let size = cnpj.length - 2;
    let numbers = cnpj.substring(0, size);
    let keys = cnpj.substring(size);
    let sum = 0;
    let pos = size - 7;
    for (let i = size; i >= 1; i--) {
      sum += numbers.charAt(size - i) * pos--;
      if (pos < 2) pos = 9;
    }
    let resultado = sum % 11 < 2 ? 0 : 11 - (sum % 11);
  
    if (resultado != keys.charAt(0)) return false;
  
    size = size + 1;
    numbers = cnpj.substring(0, size);
    sum = 0;
    pos = size - 7;
    for (let i = size; i >= 1; i--) {
      sum += numbers.charAt(size - i) * pos--;
      if (pos < 2) pos = 9;
    }
    resultado = sum % 11 < 2 ? 0 : 11 - (sum % 11);
  
    if (resultado != keys.charAt(1)) return false;
    return true;
  };


  // Verificar o retorno do CNPJ
  if(isValidCnpj(CNPJ)){
    $('#txt_cnpj').css({"box-shadow": "0px 0px 8px 3px #1C5995"});
    setTimeout(function(){
      $('#txt_cnpj').css({"box-shadow": "none"});
    }, 3500);
    var validoCnpj = "true";
  }else {
    $('#txt_cnpj').focus().css({"border": "3px solid #E12E1E"});
    setTimeout(function(){
      $('#txt_cnpj').css({"border": "2px solid transparent"});
    }, 3500);
    var validoCnpj = "false";
  };

  // Verificar o retorno do CEP
  if($('#txt_cep').attr('value') == "true"){
    $('#txt_cep').css({"box-shadow": "0px 0px 8px 3px #1C5995"});
    setTimeout(function(){
      $('#txt_cep').css({"box-shadow": "none"});
    }, 3500);
    var validoCep = "true";
  }else {
    $('#txt_cep').focus().css({"border": "3px solid #E12E1E"});
    setTimeout(function(){
      $('#txt_cep').css({"border": "2px solid transparent"});
    }, 3500);
    var validoCep = "false";
  };


  //Se o returno dos três forem true, manda pro ajax
  if (validoCep == "true" && validoCnpj == "true" && validoSenha == "true") {
    $('#spinner').removeClass('visually-hidden');
    nome_ = nome.val();
    endereco_ = endereco.val() + ', ' + num.val();
    email_ = email.val();
    senha_ = senha.val();
    mec_ = mec.val();
    Cnpj_ = Cnpj.val();
    Cep_ = Cep.val();
    var data = {'nome': nome_ , 'end': endereco_,'email': email_,'senha': senha_,'mec': mec_,'cnpj': Cnpj_,'cep':  Cep_,'plano': plano, 'cidade': cidade, 'uf': uf};
    //Ajax
    $.ajax({
      method : 'POST',
      url : "php/recebe_cadastro_instituicao.php",
      data : {dados: data}
    })
    .done(function(msg){
      $('#spinner').addClass('visually-hidden');
      $('#btn_modal').click();
    })
    .fail(function(jqXHR, textStatus, msg){
      alert(msg);
    });
  }
})