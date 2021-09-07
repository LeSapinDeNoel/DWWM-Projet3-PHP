$(document).ready(function(){

  $("#burger").on("click", menu);

  function menu() {
      if($('.deroule').hasClass('cache')) {
        $('.deroule').addClass('show');
        $('.deroule').removeClass('cache');
      } else {
        $('.deroule').removeClass('show');
        $('.deroule').addClass('cache');
      }
    }
});
