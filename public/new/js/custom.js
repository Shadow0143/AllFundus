// JavaScript Document

   $(window).scroll(function(){
       var scroll = $(window).scrollTop();
           sticky= $('.header');
       
        if(
            scroll >= 25
        ){
            sticky.addClass('fixed')
        }else{
            sticky.removeClass('fixed'  )
        }
       
   });

   	
$('ul.tabs li').click(function(){
    var index = $(this).index();
    $('ul.tabs li').removeClass('active');
    $(this).addClass('active');
    $('.tab_content').removeClass('active');
    $('.tab_content:eq(' + index + ')').addClass('active');
});



   $(window).resize(function(){
       var getwidth = $(this).width();
       if(getwidth >= 767){
           $('.menu').removeAttr('style');
       }
   })
    
   $(document).ready(function(){
    $('.banner_slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
      });
   })
       
 