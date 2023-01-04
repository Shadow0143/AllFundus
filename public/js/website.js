jQuery(document).ready(function() {

	



/***************************************************************************************/

 



// (function(jQuery) {

//     jQuery.fn.clickToggle = function(func1, func2) {

//         var funcs = [func1, func2];

//         this.data('toggleclicked', 0);

//         this.click(function() {

//             var data = jQuery(this).data();

//             var tc = data.toggleclicked;

//             jQuery.proxy(funcs[tc], this)();

//             data.toggleclicked = (tc + 1) % 2;

//         });

//         return this;

//     };

// }(jQuery));







/***************************************************************************************/





jQuery('#open-nav-menu').clickToggle(function() {   

    jQuery(this).addClass("opened");

	jQuery('#slideNav').css("display","block");	

	jQuery('.slideOverlay').css("display","block");	

	jQuery(".slideNav-wrapper").addClass("opened");

	jQuery(".mobileHeader").slideDown();

			

},

function() {

    jQuery('#open-nav-menu').removeClass("opened");

	jQuery('#slideNav').css("display","none");	

	jQuery('.slideOverlay').css("display","none");	

	jQuery(".slideNav-wrapper").removeClass("opened");

	jQuery(".mobileHeader").slideUp();

});





















/***************************************************************************************/



 jQuery('ul.faqList li').clickToggle(function() { 

  

   jQuery(this).siblings().children('div.faqA').css("display","none");

   jQuery(this).siblings().children('div.faqQ').removeClass("active");

   jQuery(this).children('div.faqA').css("display","block");   

	jQuery(this).children('div.faqQ').addClass("active");

	



	

},

function() {

    jQuery(this).siblings().children('div.faqA').css("display","none");

    jQuery(this).siblings().children('div.faqQ').removeClass("active");

    jQuery(this).children('div.faqA').css("display","none");   

	jQuery(this).children('div.faqQ').removeClass("active");

});





/***************************************************************************************/





	

jQuery('ul.nav li.dropdown').hover(function() {

     jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);

    }, function() {

  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);

   });

		



   

   

   /****

   */

   if (jQuery('#back-to-top').length) {

    var scrollTrigger = 200, // px

        backToTop = function () {

            var scrollTop = jQuery(window).scrollTop();

            if (scrollTop > scrollTrigger) {

                jQuery('#back-to-top').addClass('show');

            } else {

                jQuery('#back-to-top').removeClass('show');

            }

        };

    backToTop();

    jQuery(window).on('scroll', function () {

        backToTop();

    });

    jQuery('#back-to-top').on('click', function (e) {

        e.preventDefault();

        jQuery('html,body').animate({

            scrollTop: 0

        }, 700);

    });

}







});











	

































