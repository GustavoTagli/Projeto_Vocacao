$(document).scroll(function(){
  var altura = $(document).height();
  var scroll = $(window).scrollTop() + $(window).height();
  altura += - 150;
  if(scroll >= altura){
  $("#header").fadeOut(200);
  } 
  else{
  $("#header").fadeIn(300);
  }
});