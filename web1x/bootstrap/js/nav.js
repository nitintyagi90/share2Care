$(window).scroll(function(event){

  var yOffset = window.pageYOffset;
  var breakpoint = 50;
  if (yOffset > breakpoint){
      $(".navbar-default").addClass("navbar-default_akkord");
      $(".button_container").addClass("button_container_akkord");
      $(".custom-nav").addClass("custom-nav_akkord");
      $(".navbar-default").addClass("navbar-defaultnav_akkord");
      $('#my_image').attr('src','bootstrap/images/logo.jpg');
  }else{
    $(".navbar-default").removeClass("navbar-default_akkord");
      $(".button_container").removeClass("button_container_akkord");
      $(".custom-nav").removeClass("custom-nav_akkord");
      $(".navbar-default").removeClass("navbar-defaultnav_akkord");
      $('#my_image').attr('src','bootstrap/images/logo.jpg');
  }

});



/**/
$('#toggle').click(function() {
  $(this).toggleClass('active');
  $('#overlay').toggleClass('open');
});
