var instituicoes = $(".card_instituicao");
  var numCards = instituicoes.length;
  var perPage = 3;

  instituicoes.slice(perPage).hide();
  $('#pagination-container').pagination({
    items: numCards,
    itemsOnPage: perPage,
    prevText: "Anterior",
    nextText: "Próximo",
    onPageClick: function (pageNumber, event) {
      event.preventDefault();
      var showFrom = perPage * (pageNumber - 1);
      var showTo = showFrom + perPage;
      instituicoes.hide().slice(showFrom, showTo).show();
    }
  });