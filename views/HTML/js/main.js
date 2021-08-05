//window scroll
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  console.log(scroll);
  if (scroll>0) {
    $("#navbar").addClass("scroll-nav");
    $("#navbar").removeClass("scroll-0");
  } else {
    $("#navbar").addClass("scroll-0");
    $("#navbar").removeClass("scroll-nav");
  }
});

// JavaScript Document
$(document).ready(function(){
   //one page scroll activation code
  $('.navbar li a').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target
      || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top;
        $('html,body')
        .animate({scrollTop: targetOffset},1000);

      }
    }
  });


   //wow-master activation code.
    wow = new WOW(
       //options will go here.
    );
    wow.init();

});
