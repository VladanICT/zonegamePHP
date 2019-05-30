$(document).ready(function(){
  
  /*Function for slider*/
  
  slideShow();
  
});


function slideShow() {
  var current = $('#slika .show');
  var next = current.next().length ? current.next() : current.parent().children(':first');
  
  current.hide().removeClass('show');
  next.show().addClass('show');
  
  setTimeout(slideShow, 3000);
}

