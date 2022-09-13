$(function () {
    var $progress = $('.progress-bar');
    var $questoes = $('.questoes');

    $questoes.find('.escolha').prop('checked', false);
    
    var total = $questoes.find('.questao').length;

    $questoes.on('change', '.escolha', function () {
        var checked = $questoes.find('.escolha:checked').length;
        $progress.css({width: Number(checked * 100 / total)+"%"})

        setTimeout(function(){
        var tamTotal = $(".progress").width();
        var tamProgress = $progress.width();
        var Porcen = (tamProgress*100)/tamTotal;
        
        if (Porcen>=10) {
          $progress.css({"background-color": "#80c9fa"})
        }
        if (Porcen>=20) {
          $progress.css({"background-color": "#79beed"})
        }
        if (Porcen>=30) {
          $progress.css({"background-color": "#6fb2e0"})
        }
        if (Porcen>=40) {
          $progress.css({"background-color": "#5f9bc4"})
        }
        if (Porcen>=50) {
          $progress.css({"background-color": "#5691b9"})
        }
        if (Porcen>=60) {
          $progress.css({"background-color": "#4e88ae"})
        }
        if (Porcen>=70) {
          $progress.css({"background-color": "#3d7093"})
        }
        if (Porcen>=80) {
          $progress.css({"background-color": "#346688"})
        }
        if (Porcen>=90) {
          $progress.css({"background-color": "#2a5a7a"})
        }
        if (Porcen==100) {
          $progress.css({"background-color": "#205172"})
        }
    }, 600);
    });
  });

  var questoes = $(".questoes .questao");
  var numQuestoes = questoes.length;
  var perPage = 1;
  
  $(function(){
    $('#pagination-container a.next').addClass("disabledbutton");
  })

  var c = perPage;
  $("#progresso_texto").html("1/18");

  $('input:radio').on('click', function(){
    var radio = $('input:radio:checked');
    if (radio.length == c) {
      $('#pagination-container a.next').removeClass("disabledbutton");
    }else{
      if(radio.length > c){
        $('#pagination-container a.next').removeClass("disabledbutton");
        if ($('input:radio:checked').length == numQuestoes) {
          $('button span').removeClass("disabledbutton");
        }
      }
      else{
        $('#pagination-container a.next').addClass("disabledbutton");
      }
    }
  });

  questoes.slice(perPage).hide();
  $('#pagination-container').pagination({
    items: numQuestoes,
    itemsOnPage: perPage,
    prevText: "Anterior",
    nextText: "Próximo",
    onPageClick: function (pageNumber, event) {
      event.preventDefault();
      var showFrom = perPage * (pageNumber - 1);
      var showTo = showFrom + perPage;
      questoes.hide().slice(showFrom, showTo).show();
      $("#progresso_texto").html(pageNumber+"/18");

      if ($('input:radio:checked').length<showTo) {              
        $('#pagination-container a.next').addClass("disabledbutton");
      }else{
        $('#pagination-container a.next').removeClass("disabledbutton");
      } 

      $('input:radio').on('click', function(){
        var radio = $('input:radio:checked');
        if (radio.length == showTo) {
          $('#pagination-container a.next').removeClass("disabledbutton");
        }else{
          if(radio.length > showTo){
            $('#pagination-container a.next').removeClass("disabledbutton");
            if ($('input:radio:checked').length == numQuestoes) {
              $('#pagination-container .disabled button').removeClass("disabledbutton");
            }
          }
          else{
            $('#pagination-container a.next').addClass("disabledbutton");
          }
        }
      });

      if (showTo >= numQuestoes){
        var novo = $('<button><span>');
        var antigo = $('#pagination-container span');

        antigo.before(novo);
        novo.append(antigo.children());
        antigo.remove();

        $('#pagination-container span').html("Finalizar")
        .attr('id', "finalizar")
        .attr('type', 'submit')
        if ($('input:radio:checked').length<numQuestoes){
          $('#pagination-container .disabled button').addClass("disabledbutton");
        }
      }

    }
  });