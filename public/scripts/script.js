$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: false
  });
});


$(function() {

    if ( $(window).width() > 768 ) {
      $('.toggle').on('click', function(e) {
        if($(this).hasClass('noredirect')){ e.preventDefault(); }
          if($(this).hasClass('index-redirect') && ! $(this).parent().hasClass('active')){ e.preventDefault();}
        
        $('.navbar li')
          .removeClass('active')
          .eq($(this).data('toggle') - 1)
          .toggleClass('active');

        $('.info')
          .removeClass('active');

        $('.item-' + $(this).data('toggle'))
          .addClass('active');
      });

      $('.close').on('click', function(e) {
        var parentIndex = $(this).parent().find('a').data('toggle');
        var parent = $('.item-' + parentIndex);

        parent.addClass('pre-remove');
        $('.toggle-' + parentIndex).addClass('pre-remove');

        setTimeout(function() {
          parent.removeClass('pre-remove active');
          $('.toggle-' + parentIndex).removeClass('pre-remove active');
        }, 800);

      })
    } 

   // $('.navbar-5 li').on('mouseover', function() {
   //  $(this).addClass('active');

   //  $('.info').removeClass('active').eq($(this).index() + 1).addClass('active');
   // });

    $('.gallery-image').colorbox({
      rel: '.gallery-image'
    });

   //  $('.slider-wrapper').flexslider({
   //   animation: "slide"
    // });

    // $('.burger-menu').click(function () {
    //       $(this).toggleClass("menu-on");
    //       console.log('?');

    //       $('nav').toggleClass('active');
    // });

    $('.burger-menu').on('click', function(){
      $(this).toggleClass("menu-on");
          console.log('?');

      $('nav').toggleClass('active');
    });
});